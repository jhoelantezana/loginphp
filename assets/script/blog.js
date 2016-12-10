var AjaxBlog = (function () {
    function AjaxBlog(method, url, send, pro) {
        if (send === void 0) { send = null; }
        this.petition = new XMLHttpRequest();
        this.petition.open(method, url);
        this.petition.onreadystatechange = pro;
        this.petition.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        this.petition.send(send);
    }
    AjaxBlog.prototype.process = function (pro) {
    };
    return AjaxBlog;
}());
var showPost = function () {
    var setValuesDom = function () {
    };
    var getPost = function () {
        if (req.petition.status == 200 && req.petition.readyState == 4) {
            var resValues = JSON.parse(req.petition.responseText);
            console.log(resValues);
        }
    };
    var req = new AjaxBlog('POST', 'http://localhost/blog/post', 'dta=sss', getPost);
};
setInterval(function () {
    showPost();
}, 2000);
