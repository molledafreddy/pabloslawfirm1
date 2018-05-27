<template>
    <div>
    <section id="about" class="zona-3">
        <div class="container">
            <div class="py-5">
                    <H2><strong>SOBRE LOS ABOGADOS</strong></H2>
            </div>
            <transition-group v-bind:name="effect" class="row">
                <div class="col-sm-12 col-md-6 mb-3  text-center align-self-center" v-for="(content,index) in contents" :key="index" tag="div">
                    <template v-if="content.id != draft.id" >
                        <img class="img-fluid mb-2" :src="content.image" alt="">
                        <p><h4>{{content.title}}</h4></p>
                        <p><h4>{{content.sub}}</h4></p>
                        <p class="text-justify" >
                            {{content.description}}
                        </p>
                        <template v-if="content != ''">
                        <!-- <button type="button" class="btn btn-primary ml-auto mr-auto d-block" style="margin-bottom: 10px">{{content.button}}</button> -->
                            <button type="button" class="btn btn-info ml-auto mr-auto" @click="edit(content,index)" v-if="admin"><i class="fas fa-pencil-alt"></i></button>
                             <button type="button" class="btn btn-danger ml-auto mr-auto " @click="remove(index)" v-if="admin"><i class="far fa-trash-alt"></i></button>
                        </template>

                    </template>
                    <template v-else>
                        <form action="">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Image</label>
                                <input class="form-control" type="file" @change.prevent="processFile($event)">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input class="form-control" type="text" v-model="draft.title">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">sub</label>
                                <input class="form-control" type="text" v-model="draft.sub">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Description</label>
                                <textarea class="form-control"  v-model="draft.description" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Button</label>
                                <input class="form-control" type="text"  v-model="draft.button">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" @click.prevent="save(content,index)"><i class="fas fa-check"></i></button>
                                <button class="btn btn-danger" @click.prevent="cancel(content,index)"><i class="fas fa-ban"></i></button>

                            </div>
                        </form>
                    </template>
                </div>
            </transition-group>
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
                effect: 'fadeLeft',
                currentContent: 0,
                showModal:false,
                someData:null,
                admin: false,
                draft:{},
                section:4,
            }
        },
        mounted(){
            //this.$store.dispatch('listComponents');
        },
        methods:{
            edit(content){
                this.draft = clone(content);
            },
            save(){
                this.$store.dispatch('saveComponent',this.draft).then(() => {
                        var sfl=this;
                        setTimeout(function(){
                            sfl.$loading.endLoading('updateComponent');
                            sfl.draft = {};
                        },2000);
                })
                .catch(() => {
                    console.log('error');
                })
            },
            cancel(content,index){
                this.draft = {};
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

            //pendientes
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

            //modal
            setCurrent(index){
                this.currentContent = this.contents[index]['detailmodal'];
                this.$refs.modal1.show()
            },

            hideModal(){
                this.$refs.modal1.hide()
            },
            shortExpanded(index) {
                marked.setOptions({
                renderer: new marked.Renderer(),
                gfm: true,
                tables: true,
                breaks: true,
                pedantic: false,
                sanitize: true,
                smartLists: true,
                smartypants: false,
                breaks: true,
                });
                var content = marked(this.contents[index] ? this.contents[index].modal_text : '').substring(0, 600) + '...'
                return content
            }
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
</script>