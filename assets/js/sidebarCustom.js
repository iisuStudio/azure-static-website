$(document).ready(function(){
    $.get("/sidebar-menu-list.xml", function(data, status){
        var rootNode = data.getElementsByTagName("menu");
        var protocol = window.location.protocol;
        var host = window.location.host;
        var url = protocol+"//"+host+"/";
        var article = [];
        var text = "";
        
        function parser(node){
            var children = node[0].children;

            for(i = 0; i < children.length; i++){
                    //一般連結
                    if(children[i].tagName == "link"){
                        text += "<li><a href="+url+children[i].textContent+">"+children[i].getAttribute("name")+"</a></li>";
                        
                    }
                    //分類底下的文章
                    if(children[i].tagName == "class"){
                        text += "<li><span class=\"opener\" id=\""+"spanlist"+i+"\""+"onClick=\"sidebar_span_click(this.id)\">"+children[i].getAttribute("name")+"</span><ul>";
                        var a = children[i].getAttribute("name");
                        var ccc = data.getElementsByName(a)[0].children;
                        for(j = 0; j < ccc.length; j++){
                        if(ccc[j].tagName == "link"){
                                text += "<li><a href="+url+ccc[j].textContent+">"+ccc[j].getAttribute("name")+"</a></li>";
                                article.push(ccc[j].textContent.substr(9, 12)+ccc[j].getAttribute("name"));
                            }
                        }
                        text += "</ul></li>";
                    }
                }
        }

        parser(rootNode);
        document.getElementById("menu-list").innerHTML = text;
        
        article.sort();
        article.reverse();
        
        var axel = Math.random() + "";
		var num = axel * 1000000000000000000;
        
        text = "";
        text += "<div class=\"content\">";
        text += "<header>";
        text += "<h1>"+article[0].substr(12, 64)+"</h1>";
        text += "</header>";
        text += "<p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. Pellentesque sapien ac quam. Lorem ipsum dolor sit nullam.</p>";
        text += "<ul class=\"action\"><li><a href=\""+url+"articles/"+article[0].substr(0, 12)+"/Page1.html\""+"class=\"button big\">Learn More</a></li></ul></div>";
        text += "<span class\"image object\">"
        text += "<img width=\"100%\" src=\""+url+"articles/"+article[0].substr(0, 12)+"/images/pic.png?"+num+"\" alt\"\" /"+"</span>";
        document.getElementById("banner").innerHTML = text;
        
        for(i = 1, text = ""; i < 4 && article && article[i]; i++){
            text += "<article>"
            text += "<a href=\""+url+"articles/"+article[i].substr(0, 12)+"/Page1.html\" class=\"image\"><img  src=\""+url+"articles/"+article[i].substr(0, 12)+"/images/pic.png?"+num+"\" alt=\"\" /"+"</a>";
            text += "<h3>"+article[i].substr(12, 64)+"</h3>";
            text += "<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>";
            text += "<ul class=\"actions\"><li><a href=\""+url+"articles/"+article[i].substr(0, 12)+"/Page1.html"+"\" class=\"button\">More</a></li></ul>";
            text += "</article>";
        }
        document.getElementById("recent-posts").innerHTML = text;
        /*
        <div class="content">
            <header>
                <h1>Hi, I’m Editorial<br />
                by HTML5 UP</h1>
                <p>A free and fully responsive site template</p>
            </header>
            <p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. Pellentesque sapien ac quam. Lorem ipsum dolor sit nullam.</p>
            <ul class="actions">
                <li><a href="#" class="button big">Learn More</a></li>
            </ul>
        </div>
        <span class="image object">
            <img src="images/pic10.jpg" alt="" />
        </span>*/
        /*<article>
            <a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
            <h3>Interdum aenean</h3>
            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
            <ul class="actions">
                <li><a href="#" class="button">More</a></li>
            </ul>
        </article>*/
    });
    
    
});
//清單中的分類選單點擊事件
function sidebar_span_click(id){
    if(document.getElementById(id).className == "opener"){
        document.getElementById(id).className = "opener active";
    }
    else if(document.getElementById(id).className == "opener active"){
        document.getElementById(id).className = "opener";
    }
}
