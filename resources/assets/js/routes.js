import VueRouter from 'vue-router';		
import CriminalView from './components/CriminalView.vue';
import NotFoundComponent from './components/NotFoundComponent.vue';
// import GroupView from './components/GroupView.vue';
let routes = [ 
{ 		
	path : '/criminal/:criminalId',
	name : 'criminalView',
	component : CriminalView,	
	props : true 
},
{
	path : '/criminal',
	component : CriminalView,	
	props : true 	
	// name : 'criminalView',
},

{
 path: '*', component: NotFoundComponent 
}


];

export default new VueRouter({
	// mode : 'history',
	routes,
	linkActiveClass: 'is-active'
});

