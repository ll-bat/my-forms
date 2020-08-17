

export class Select{
    constructor(){
        this.title = ''
        this.values = []
        this.name='select-component'
        this.type = 'radio'
        this.required = false
        this.children = Select.getChildren()

        this.hasImage = false
        this.image    = ''
    }

    static getChildren(){
        return ['radio', 'checkbox', 'dropdown']
    }

    setData(data){
        this.title    = data['title'] == 'NULL' ? '' : data['title']
        this.id       = data['id']
        this.type     = data['type']
        this.required = data['required']
        
        if (data['image'] && data['image'] != 'null')
        {
           this.hasImage = true
           this.image =  data['image']
        }

        data =        data['rels']
       
        data.map((el) => {
            this.values.push({id: el['id'], value: el['value'] == 'NULL' ? '' : el['value']})
        })
    }
     
    dsetData(data){
        this.id = data
    }

    fset(data){
        let keys = Object.keys(data)
        keys.forEach((key) =>{
            this[key] = data[key]
        })
        
        return this
    }
}