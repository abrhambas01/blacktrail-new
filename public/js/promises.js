let p = new Promise((resolve, reject)  => {
	let a = 1 + 1
	if ( a  == 2 ){
		resolve('sucecss');
	} else { 
		reject('failed');
	}
}); 


p.then((message) => {
	console.log("this is the then" + message);
}).catch((message) => { 
	console.log("this is in catch method" + message);
});