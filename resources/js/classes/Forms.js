export class Form {
    constructor(){
        this.shared = ['id', 'title','hasImage', 'image', 'required']
    }

    submit(type, url, data, saving = [true]){

        return new Promise((resolve, reject) => 
        { 
           axios[type](url,data)
              .then((res) => {
                  saving[0] = false
                  resolve(res.data)
              })
              .catch((errors) => {
                  saving[0] = false
                  alert('Unfortunately, error occured. Please check the console tab')
                  console.log(errors.response.data)
                  reject(errors.response.data)
              })
        }) 
    }

    changeObject(oldObj, newObj){
         this.shared.forEach((key) => {
             newObj[key] = oldObj[key]
         })
         
         return newObj
    }

    deleteUpload(obj){
        obj.hasImage = false
        obj.image    = ''
    }

    fset(obj, data){
        let keys = Object.keys(data)
        keys.forEach((key) =>{
            obj[key] = data[key]
        })
        
        return obj
    }
}