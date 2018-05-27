<template>
        <section id="testimony" class="zona-2 zona-azul">
            <div class=" py-5 col-sm-12 col-md-12">
                    <h2 class="title"><strong>TESTIMONIOS</strong></h2>
            </div>
            <div class="row ml-0 mr-0">
                <div class="container-fluid pb-2 pl-0 pr-0" >
                    <div id="carouselTestimonyControls" class="carousel slide" data-ride="carousel" >
                        <div class="carousel-inner">
                            <div class="carousel-item item-testomony active">
                                <h3 class="text-center" alt="First slide">Gran Abogado, gran servicio al cliente. Te lo recomiendo!. "Mariana Sierra"</h3>
                            </div>
                            <div class="carousel-item item-testomony">
                                <h3 class="text-center" alt="First slide">Excelente atención. Pude entender todo el proceso legal sin ningún estrés. <br> Me ayudó con los papeles para mis estudios. "Gustavo Bracho" </h3>
                            </div>
                            <div class="carousel-item item-testomony">
                                <h3 class="text-center" alt="First slide">El servicio es simple y eficiente. El personal es excelente <br> y las tarifas son asequibles. "Roberto Chavez" </h3>
                            </div>
                            <div class="carousel-item item-testomony">
                                <h3 class="text-center" alt="First slide">Analuisa Pablos es un gran abogado, los empleados <br> son muy buenos y útiles. "Mariana Sierra"</h3>
                            </div>
                        </div>
                        <a class="carousel-control-prev top-slide" href="#carouselTestimonyControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next top-slide" href="#carouselTestimonyControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="false"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!-- <a class="carousel-control-prev test-prev" href="#carouselTestimonyControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next test-next" href="#carouselTestimonyControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a> -->
                    </div>
                </div>
            </div>
        </section>
</template>
<script>
    export default{
        props:['component'],
        data(){
            return{
                effect: 'fadeLeft',
                currentContent: 0,
                showModal:false,
                someData:null,
                admin: false,
                section:8
            }
        },
        mounted(){
            
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
        methods:{
            edit(content, index){
                 this.draft = clone(content);
            },
            save(content,index){
                 this.contents[index] = this.draft
                 this.draft = {};
            },
             cancel(content,index){
                 this.draft = {};
             },
             processFile(e){
                 var files = e.target.files || e.dataTransfer.files;
                 if (!files.length)
                     return;
                     this.createImage(files[0]);
            },
             createImage(file) {
                 var image = new Image();
                 var reader = new FileReader();
                 var vm = this;
                 reader.onload = (e) => {
                     vm.draft.img = e.target.result;
                 };
                 reader.readAsDataURL(file);
             },
             remove(idComponent){
                var obj={};
                obj.section=this.section;
                obj.idcomponent=idComponent;
                this.$store.dispatch('removeComponent',obj).then(() => {
                    this.draft = {};
                    this.$loading.endLoading('deleteComponent'+idComponent);         
                })
                .catch(() => {
                    console.log('error');
                })
            },
            addItem: function (){
                this.classItem='hide';
                var slf=this;
                setTimeout(function(){
                    slf.items=[];
                    slf.items.push('hola');
                    slf.items.push('lala');
                    slf.classItem='show';
                },700);
                /*this.items.push('lala');
                return false;*/
            },
         }
    }

</script>
<style>
    .col-compo{
        flex: 1 0 0;
    }
    .zona-azul{
        background-color: #1E88E5;
    }
    @media (max-width: 991px){
       .col-compo{
         flex:none;
       }
       .item-testomony h3{
         font-size: 3vh!important;
         padding-left: 20px!important;
          padding-right: 20px!important;
       }

    }

    .top-slide{
         top:-80%!important;
    }
    .item-testomony{
        height: 170px!important;
    }
   
    
    .title, .item-testomony h3{
        color:#f8f9fa;
    }
</style>
