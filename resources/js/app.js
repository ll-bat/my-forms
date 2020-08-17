
require('./bootstrap');


window.Vue = require('vue');
window.Event = new Vue();
window.Forms = new Form();


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('panel-component', require('./components/PanelComponent.vue').default);
Vue.component('delete-component', require('./components/DeleteComponent.vue').default);
Vue.component('head-component', require('./components/HeadComponent.vue').default);
Vue.component('body-component', require('./components/BodyComponent.vue').default);
Vue.component('select-component', require('./components/SelectComponent.vue').default);
Vue.component('ipanel-component', require('./components/IPanelComponent.vue').default);
Vue.component('input-component', require('./components/InputComponent.vue').default);


import  {Header} from "./classes/Header";
import  {Form} from "./classes/Forms";
import  {Select} from "./classes/Select";
import  {Input} from "./classes/Input";
import ExampleComponent from "./components/ExampleComponent";
import HeaderComponent from "./components/HeaderComponent";
import PanelComponent from "./components/PanelComponent";
import DeleteComponent from "./components/DeleteComponent";
import HeadComponent from "./components/HeadComponent";
import BodyComponent from "./components/BodyComponent";
import SelectComponent from "./components/SelectComponent";
import IPanelComponent from "./components/IPanelComponent";
import InputComponent from "./components/InputComponent";
import Axios from "axios";


const app = new Vue({
    el: '#app',
    components : {
        ExampleComponent,
        HeaderComponent,
        PanelComponent,
        DeleteComponent,
        HeadComponent,
        BodyComponent,
        SelectComponent,
        IPanelComponent,
        InputComponent
    },
    data:{
       components: [],
       ns: -1,
    },
    methods:{
        setns(id){
            this.ns = id
        },
        chooseType(type){
             if (type == 'header')
                return new Header()
             else if(Input.getChildren().includes(type))
                return Forms.fset(new Input(), {type: type})
             else if(Select.getChildren().includes(type))
                return Forms.fset(new Select(),{type: type})

        },
        createComponent(type){ 
             let qt = type == 'header' ? type : 'select'
             let comp =  this.chooseType(type)
             Forms.submit('post', `docs/create-${qt}`, {'type': 'radio'})
                  .then((res) => {  comp.dsetData(res); })
                  .catch((err) => { this.components.pop() })

             setTimeout(()=>{
                this.components.push(comp)
             },200)

        },
        deleteComponent(id){

            Forms.submit("delete", `docs/delete-component/${id}`, {})
                 .then((res) => { })
                 .catch((err) => { })

                setTimeout(function(){
                    app.components = app.components.filter((comp) =>{
                        return comp.id !== id
                    })
                }, 200)

        },
        processData(data){
            data.map((rel) =>{
                  let type=rel['type'];

                  let comp = this.chooseType(type)
                  comp.setData(rel)
                  this.components.push(comp)
            })

        },
        changeType(ind, type, comp){
            if (type.from == type.to) return

            let id = this.components[ind].id
            let fullChange = 1

            comp.saving = true

            if (this.components[ind].children.includes(type.to))
            {
                fullChange = 0
            }

            Forms.submit('patch', `docs/change-quest/${id}`, {type: type.to, change: fullChange})
                 .then((res) =>{ comp.saving = false })
                 .catch((err) => { comp.saving=false; })
            

            if (fullChange == 0){
              this.components[ind].type = type.to
            }
            else {
                let newObj = Forms.changeObject(this.components[ind], this.chooseType(type.to))

                this.components = this.components.map((comp,index) => {
                    if (index == ind)
                       return newObj
                    return comp
                })
            }
            
        },
        toggleRequire(id, comp){
            comp.saving = true
            Forms.submit("patch", `docs/change-quest/${id}`, {required: true})
                 .then((res)=>{comp.saving=false})
                 .catch((err)=>{ comp.saving=false; })
        },

        clickImage(ind){
            let id = 'editimage' + ind
            $1(id).click()
        },
        editImage(event, comp){
             let fm = new FormData()
             fm.append('image', event.target.files[0]);

             comp.object.hasImage = false
             let loading = [true]
             comp.imageLoading = loading
             Forms.submit('post', `docs/${comp.object.id}/upload`, fm, loading)
                .then((res) => { 
                    Forms.fset(comp.object, {hasImage:true, image: res})             
                 })
                .catch((err) => { })
       },
       removeImage(comp){
        
        Forms.submit("delete", `docs/upload/${comp.object.id}/remove`, {})
             .then((res) => {  Forms.deleteUpload(comp.object)})
             .catch((err) => { })
        },

        changeShadow(index){
            this.setns(index)
        },
    },
    created(){
        Event.$on('new-element', (type)=>{
            this.createComponent(type)
        })

        this.$on("delete", (id) =>{
            this.deleteComponent(id)
        })

         axios.get('docs/all').
                then((res) => {  
                       this.processData(res.data)
                    })
                .catch((err) => console.log(err.response.data))
        
    }
});
