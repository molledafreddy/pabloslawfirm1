<template>
    <section id="visas" class="zona-2">
        <new-visa :show="showModal" @close="showModal = false"/>
        <div class="container">
            <div class="py-5">
                    <H2><strong>VISAS</strong></H2>
                    <button class="btn btn-danger" @click.prevent="showModal = true" v-if="admin">Add Visa</button>
            </div>
            <button class="btn btn-danger" @click.prevent="showModal = true" v-if="admin">Add Visa</button>
            <div >
                <transition-group v-bind:name="effect" class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 text-center" v-for="(content,index) in contents" :key="index" tag="div">
                        <div cla>
                            <img class="img-fluid m-5 visas pic" :src="content.image" style="height: 100px; width=100px">
                            <h3>{{content.title}}</h3>
                            <p class="text-justify">{{content.description}}</p>
                            <button type="button" class="btn btn-danger ml-auto mr-auto d-block" v-if="content.detailmodal.modal_text" 
                                style="margin-bottom: 10px" @click="setCurrent(index)">{{content.detailbutton.button_name}}</button>

                            <a :href="content.detailbutton.button_link" class="btn btn-danger ml-auto " v-if="content.detailbutton.button_link" style="margin-bottom: 10px">
                                {{content.detailbutton.button_name}}
                            </a>
                        </div>
                    </div>
                </transition-group>
            </div>
            <b-modal ref="modal1" size="lg" :title="currentContent.modal_title" hide-footer>
                <p class="text-justify" d-block v-html="contentExpanded">
                </p>
                <b-btn class="mt-3" variant="outline-danger" block @click="hideModal">Cerrar</b-btn>
            </b-modal>
        </div>  
    </section>
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
                section:7
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
    }
</script>