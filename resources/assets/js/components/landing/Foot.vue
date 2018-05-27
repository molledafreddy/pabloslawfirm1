<template>
    <div>
        <section id="footer" style="margin-top: -2px;">
            <div class="container-fluid pie-pagina">
                <div class="row ml-0 mr-0">
                    <template>
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center p-0 m-0" v-for="(content,index) in contents">
                            <img class="img-fluid m-3 foot pic" :src="url+'/'+content.image" alt="">
                            <h3>{{content.title}}</h3>
                            <p>{{content.description}}</p>
                        </div>
                        <button class="btn btn-info" style="margin: 10px" @click="edit" v-if="admin"><i class="fas fa-pencil-alt"></i></button>
                    </template>
                </div>
                 <div class="col-12 text-center">   
                            <h6 style="margin-bottom:-10px;">The Pablos Law P.C | Follow Us on <a href="https://www.facebook.com/analuisapabloslaw/">Facebook</a> | Copyright 2018 | All Rights Reserved | Private Policy | Developed by <a href="https://www.ade-mia.com/" target="blank">Ademia</a> </h6>
                        </div>
            </div>
        </section>
    </div>
</template>
<script>
let marked = require('marked');
    export default{
        props:['component'],
        data(){
            return{
                url:window.location.origin,
                currentContent: 0,
                showModal:false,
                someData:null,
                admin: false,
                section:6
            }
        },
        mounted(){
          console.log(window.location.origin);  
        },
        methods:{
            
            setCurrent(index){
                this.currentContent = this.contents[index]['detailmodal'];
                this.$refs.modal1.show()
            },

            hideModal(){
                this.$refs.modal1.hide()
            },

        },
        computed: {
            contentExpanded() {
              marked.setOptions({
                renderer: new marked.Renderer(),
                gfm: true,
                tables: true,
                breaks: true,
                pedantic: false,
                sanitize: true,
                smartLists: true,
                smartypants: false
              });
              return marked(this.currentContent ? this.currentContent.modal_text : '' )
             },contents(){
                var list_components=this.$store.getters.getComponents(this.section);
                return list_components.components;
             }
        },
    }

   // export default{
   //      data(){
   //          return{
   //              admin: false,
   //              editing: false,
   //              content:{
   //                  addr1: '1112 Montana El Paso',
   //                  addr2: 'Texas 79902',
   //                  day: 'Lunes - Viernes:',
   //                  hour:'8:00 am - 2:00 pm',
   //                  phone:'Office: +1 915-544-3132',
   //              },
   //              draft: null,
   //          }
   //      },
   //      methods:{
   //          edit(){
   //              this.draft = clone(this.content)
   //              this.editing = true
   //          },
   //          save(){
   //              this.content = this.draft
   //              this.editing = false
   //          },
   //          cancel(){
   //              this.editing = false
   //          }
   //      }
   //  }
</script>