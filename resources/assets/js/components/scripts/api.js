export const user 	 						=      window.App.user  ; 
export const algoliaId 						=  	   window.App.algoliaId ; 
export const algoliaKey 					= 	   window.App.algoliaKey ;
export const assetPath 						=  	   window.App.publicPath ; 
export const app 							=	   window.App.apiDomain; 
export const urlSaveCriminal 				= 	   window.App.addCriminalUrl; 
export const url_for_saving_photos			=      window.App.savePhotosUrl; 
export const resourcePath			 		=      window.App.resourcePath; 
export const storagePath			 		=      window.App.storagePath; 
export const csrfToken 						= 	   window.App.csrfToken; 
export const searchCriminalsEndpoint        = 	   window.App.searchCriminalsBy; 

export default {
	csrfToken : csrfToken, 
	user ,
	algoliaId , 
	algoliaKey ,
	assetPath ,
	app,	
	storagePath ,
	
	urlSaveCriminal ,
	
	searchCriminalsEndpoint,
	
	url_for_saving_photos

};


// // or
// export const APP_CONFIG = {
// 	user : user,
// 	algoliaId : algoliaId, 
// 	algoliaKey : algoliaKey,
// 	publicPath : assetPath,
// 	app : app 
// }


