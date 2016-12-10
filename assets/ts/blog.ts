class AjaxBlog{
    petition:any;
    constructor(method:string, url:string, send:string = null, pro?:any){
        this.petition = new XMLHttpRequest();
        this.petition.open(method,url);
        this.petition.onreadystatechange = pro;
        this.petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        this.petition.send(send);
    }
    process(pro?:any){
    }
}
let showPost = ()=>{
    var setValuesDom = (){
        
    }
    var getPost = ()=>{
        if(req.petition.status == 200 && req.petition.readyState == 4){
            let resValues = JSON.parse(req.petition.responseText);
            console.log(resValues);
        }
    }
    var req = new AjaxBlog(
        'POST',
        'http://localhost/blog/post',
        'dta=sss',getPost
    );
}
setInterval(()=>{
    showPost();
},2000);
