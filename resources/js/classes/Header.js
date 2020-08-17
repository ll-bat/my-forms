export class Header {
    constructor(){
        this.title = ''
        this.values = []




        this.name='header-component'
    }

    setData(data){
        this.title = data['title'] == 'NULL' ? '' : data['title']
        this.id = data['id']

        data = data['rels']
       
        data.map((el) => {
            this.values.push({id: el['id'], value: el['value'] == 'NULL' ? '' : el['value']})
        })
    }

    dsetData(data){
        this.id = data['id']
        data = data['rels']
       
        this.values.push({id: data['id'], value: data['value']})
    }
}