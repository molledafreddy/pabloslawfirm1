<template>
  <b-container fluid style="padding-top:120px;">
    <b-row>
      <b-col cols="12" sm="4" >
        <div class="detailbox">
          <div class="border-b">
            Carlos Gonzalez
          </div>
          <div>
            Aprobado (4)
          </div>
        </div>
      </b-col>
      <b-col cols="12" sm="4" >
        <div class="detailbox">
          <div class="border-b">
            Carlos Gonzalez
          </div>
          <div>
            Aprobado (4)
          </div>
        </div>
      </b-col>
      <b-col cols="12" sm="4" >
        <div class="detailbox">
          <div class="border-b">
            Carlos Gonzalez
          </div>
          <div>
            Aprobado (4)
          </div>
        </div>
      </b-col>  
    </b-row>
    <b-row class="pt-3">
        <b-col cols="12">
         <!-- Main table element -->
            <b-table ref="table" striped hover show-empty
                     stacked="md"
                     :items="items"
                     :fields="fields"
                     :current-page="currentPage"
                     :per-page="perPage"
                     :filter="filter"
                     :sort-by.sync="sortBy"
                     :sort-desc.sync="sortDesc"
                     empty-text="Cargando..."
                     @filtered="onFiltered" 
            >
            <template slot="asistente" slot-scope="row">
                {{(row["item"].asistentes.length!=0)?row["item"].asistentes["0"].name:'S/I'}}
            </template>
            </b-table>
            <b-row>
              <b-col sm="12" >
                <b-pagination :total-rows="totalRows" :per-page="perPage" v-model="currentPage" class="d-flex justify-content-center my-0" />
              </b-col>
            </b-row>
        </b-col>
    </b-row>
  </b-container>
</template>
<style>
  .detailbox{
    background-color: #a8adad;
    padding: 20px;
    border-radius: 30px;
    font-weight: 600;
    text-align: center;
    box-sizing: border-box;
    margin-left: 15px; 
  }
  .border-b{
    border-bottom: solid 1px #7b7878;
  }
  .size-descr{
    width: 50%!important;
  }
</style>
<script>
// const items = []

export default {
  data () {
    return {
      items: null,
      fields: [
        { key: 'description', label: 'Descripción', sortable: true,'class': 'size-descr' },
        { key: 'name_status', label: 'Estatus', sortable: true, 'class': 'text-center' },
        { key: 'date_created', label: 'Fecha del Caso',sortable: true, 'class': 'text-center' },
        { key: 'name_cliente', label: 'Cliente',sortable: true, 'class': 'text-center' },
        { key: 'asistente', label: 'Asistente',sortable: true, 'class': 'text-center' }
      ],
      currentPage: 1,
      perPage: 5,
      totalRows: null,
      pageOptions: [ 5, 10, 15 ],
      sortBy: null,
      sortDesc: false,
      filter: null,
      session:{
        iduser:null
      }
    }
  },
  computed: {
  },
  methods: {
    onFiltered (filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length
      this.currentPage = 1
    },
    listCases() { 
        let slf=this;
        axios.post('api/listCasesAssist').then((res)=>{
              if (res.status == 200)  {
                  console.log(res.data.data);
                  slf.totalRows= res.data.data.length;
                  slf.items=res.data.data; 
              }
          })
          .catch((error)=>{
              
          })
      }
    },mounted () {
      this.listCases();
    }
}
</script>
