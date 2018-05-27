export default {
  state: {
    session:{}
  },actions:{
        setSession({ commit },user){
           commit('setSession',{ list: user});
        },
    },getters:{
        getSession: state => {
            return state.session;
        },
    },mutations:{
      setSession(state,{ list }){
         return state.session = list;
     },logout(state){
        state.session={};
     }
    }
}