<script>
import urls from '../scripts/endpoints.js';
export default {
 props: ['activeChannel','username','chat'],
 
 data() {
  return {
    messageText: '',
    messages : []
  };
},

mounted(){
  let channel = Echo.private('user.' + this.id);
  channel.listen('.MessageSent',function(data){
    console.log(data);
  });
},

methods: {
  sendsMessage(){  
    this.$emit('saveMessage', this.inputMessage, this.chat.selectedReceiver.id)
    this.inputMessage = ''
  }
}

};
</script>
