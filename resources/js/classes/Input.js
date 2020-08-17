export class Input {
    constructor(){
        this.title = ''
        this.values = []
        this.name = 'input-component'
        this.type = 'paragraph'
        this.required = false
        this.children = Input.getChildren()

        this.hasImage = false
        this.image   = ''
    }

    setData(data){
        this.title    = data['title'] == 'NULL' ? '' : data['title']
        this.id       = data['id']
        this.required = data['required']

        if (data['image'] && data['image'] != 'null')
        {
           this.hasImage = true
           this.image =  data['image']
        }
    }

    dsetData(data){

    }

    static getChildren(){
        return ['paragraph', 'upload']
    }
}