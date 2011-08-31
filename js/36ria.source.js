/**
 * @fileOverview RIA之家脚本
 * @author 明河
 * @email minghe36@126.com
 * @site wwww.36ria.com
 * @version 3.0
 * @update 2011-03-20
 */
(function($){
    var Ria = {};
    Ria.config = {
        hook : {AUTHOR : '.J_Author',T_POPUP : '.J_Tpopup',CM : '.J_Cm',CM_FIELD : '.J_CmFormField',CM_LIST_CONDITION:'.J_CmListCondition',
                CM_LIST_ITEM : '.J_CommentListItem',SINGLE_POST : '.J_SinglePost',SINGLE_POST_TITLE : '.J_SinglePostTitle',HISTORIES : '.J_Histories',
                ALREADY_READ : '.J_AlreadyRead',POST_TITLE : '.J_Post_Title'},
        data : {EMAIL : 'data-email',COMMENT_LIST_CONDITION : 'data-comment-list-condition',ID : 'data-id',DATA_HISTORIES : 'data-histories'},
        cls : {BY_POST_AUTHOR : 'bypostauthor',ALREADY_READ_TITLE: 'already_read_title'},
        tpl : {T_POPUP : '<div class="popup-wrap J_Tpopup">' +
                            '<s class="popup-triangle"></s>' +
                            '<div class="popup">' +
                                '<iframe width="100%" height="165" class="share_self"  frameborder="0" scrolling="no" src="http://service.t.sina.com.cn/widget/WeiboShow.php?width=0&height=165&fansRow=2&ptype=1&speed=0&skin=1&isTitle=0&noborder=0&isWeibo=0&isFans=1&uid={uid}&verifier={verifier}"></iframe>' +
                            '</div>'+
                         '</div>',
               HISTORIES : '<li data-id="{id}"><a href="{url}" target="_blank">{title}</a></li>'
        },
        authorWb : {
            'mohaiguyan12@126.com' : ['1653905027','bc8818e2'],
            'minghe36@126.com' : ['1653905027','bc8818e2'],
            'greenerieshu@gmail.com' : ['1649427365','cc8c1592'],
            'spikelinyu@163.com' : ['1867624004','0b6bb11b'],
            'xthsky@gmail.com' : ['1038409867','bd483efb']
        },
        commentListCondition : {ALL : 'all',AUTHOR : 'author',READER : 'reader',RECENT20 : 'recent-20'},
        IS_HAS_LOCAL_STORAGE : false
    };
    //简单的转换模板函数
    String.prototype.TFtpl = function(o){
    return this.replace(/{([^{}]*)}/g,
            function (a,b){
                var r = o[b];
                return typeof r==='string'?r:a;
            }
    );

}; 
    /**
     * 弹出层
     */
    Ria.Tpopup = function(container,config){
        var self = this;
        self.container = $(container);
        self.config = $.extend(Ria.Tpopup.DEFAULT_CONFIG,config);
    };
    Ria.Tpopup.DEFAULT_CONFIG = {
        authorWb : Ria.config.authorWb,
        hook : Ria.config.hook.T_POPUP,
        tpl : Ria.config.tpl.T_POPUP,
        anim : {
            show : {"top":"102px","opacity":1,'display':'block'},
            hide : {"top":"122px","opacity":0,'display':'none'}
        }
    };
    Ria.Tpopup.boxCache = {};
    Ria.Tpopup.prototype = {
        /**
         * 初始化
         */
        _init : function(){
            var self = this;
            if(self.container.length == 0) return false;
        },
        /**
         * 创建弹出层
         */
        _create : function(container,authorWb){
            var self = this,config = self.config,boxCache = Ria.Tpopup.boxCache,box,tpl = config.tpl,$c = $(container),uId = authorWb[0],verifier = authorWb[1],html;
            if(boxCache[uId]){
                box = boxCache[uId];
                $c.append(box);
            }else{
                html = tpl.TFtpl({uid : uId, verifier : verifier});
                box = $(html).appendTo($c).clone();
                $c.children(config.hook).css(config.anim.hide);
                boxCache[uId] = box;
            }
        },
        /**
         * 显示
         * @param container
         * @param email
         */
        show : function(container,email){
            var self = this,$c = $(container),config = self.config,authorWb = config.authorWb[email];
            if($c.children(config.hook).length == 0){
                self._create(container,authorWb);
            }
            $c.children(config.hook).fadeIn('fast');
            self.anim($c.children(config.hook),'show');
        },
        /**
         * 隐藏
         * @param container
         */
        hide : function(container){
            var self = this,$c = $(container),config = self.config;
            self.anim($c.children(config.hook),'hide');
        },
        /**
         * 动画
         * @param $target
         * @param type
         */
        anim : function($target,type){
            var self = this,animParam = {},anim = self.config.anim;
            animParam = type == 'show' && anim.show || anim.hide;
            $target.stop().animate(animParam,"normal",function(){
                if(type == 'hide') $target.hide();
            });
        }
    };
    /**
     * html5离线存储
     */
    Ria.localStorage = {
        /**
         * 获取/设置存储字段
         * @param name
         * @param value
         */
        item : function(name,value){
            var val = null;
            if(Ria.localStorage.isSupportLocalStorage()){
                if(value){
                    localStorage.setItem(name,value);
                    val = value;
                }else{
                    val = localStorage.getItem(name);
                }
            }else{
                console.log('浏览器不支持html5的本地存储');
            }
            return val;
        },
        /**
         * 移除指定name的存储
         * @param name
         * @return {Boolean}
         */
        removeItem : function(name){
            if(Ria.localStorage.isSupportLocalStorage()){
                localStorage.removeItem(name);
            }else{
                console.log('浏览器不支持html5的本地存储');
                return false;
            }
            return true;
        },
        /**
         * 判断浏览器是否直接html5本地存储
         */
        isSupportLocalStorage : function(){
            var ls = Ria.localStorage,is = ls.IS_HAS_LOCAL_STORAGE;
            if(is == null){
                if(window.localStorage){
                    is = ls.IS_HAS_LOCAL_STORAGE = true;
                }
            }
            return is;
        },
        IS_HAS_LOCAL_STORAGE : null
    };
    /**
     * 根据条件显示评论列表
     */
    Ria.CommentList = function(condition){
        var config = Ria.config,hook = config.hook,cls = config.cls,cdt = config.commentListCondition,$items = $(hook.CM_LIST_ITEM),
            start,recent20Num = 20;
        switch(condition){
            case cdt.ALL :
                $items.show();
            break;
            //只显示作者的评论
            case cdt.AUTHOR :
                $items.each(function(){
                    if(!$(this).hasClass(cls.BY_POST_AUTHOR)){
                        $(this).hide();
                    }else{
                        $(this).show();
                    }
                });
            break;
            //只显示读者的评论
            case cdt.READER :
                $items.each(function(){
                    if($(this).hasClass(cls.BY_POST_AUTHOR)){
                        $(this).hide();
                    }else{
                        $(this).show();
                    }
                });
            break;
            //只显示最近20条评论
            case cdt.RECENT20 :
                if($items.length < recent20Num) return false;
                start = $items.length - recent20Num;
                $items.each(function(i){
                    if(i >= start){
                        $(this).show();
                    }else{
                        $(this).hide();
                    }
                });
            break;
        }
    };
    /**
     * 显示用户的浏览记录
     * @param {Object} config 配置
     */
    Ria.Histories = function(config){
        var self = this;
        self.data = [];
        self.config = $.extend(Ria.Histories.DEFAULT_CONFIG,config);
        self._init();
    };
    Ria.Histories.DEFAULT_CONFIG = {
        count : 13,
        maxClearNumber : 100,
        maxTitleLen : 24,
        ls : Ria.localStorage,
        storeName : Ria.config.data.DATA_HISTORIES,
        tpl : Ria.config.tpl.HISTORIES
    };
    Ria.Histories.prototype = {
        /**
         * 初始化
         */
        _init : function(){
            var self = this,ls = self.config.ls;
            //不支持html5的离线存储，直接退出
            if(!ls.isSupportLocalStorage()) return false;
            self.getData();
        },
        /**
         * 将数据加入dom
         * @param {String} container 容器
         */
        appendTo : function(container){
            var self = this,$container = $(container),html = '',data = self.data,config = self.config,maxTitleLen = config.maxTitleLen,tpl = config.tpl,count = config.count;
            if($container.length == 0 || data.length == 0) return false;
            $.each(data,function(i){
                this.title = this.title.substr(0,maxTitleLen);
                html += tpl.TFtpl(this);
				if(i >= count) return false;
            });
            return $(html).appendTo($container);
        },
        /**
         * 获取本地数据
         */
        getData : function(){
            var self = this,config = self.config,ls = config.ls,sData = ls.item(config.storeName);
            if(sData) self.data = JSON.parse(sData);
            return self.data;
        },
        /**
         * 将值保存到本地数据
         * @param {Object} singleData 文章数据
         */
        save : function(singleData){
            var self = this,config = self.config,ls = config.ls,sData;
            if(typeof singleData == 'object'){
                if(self.isExist(singleData.id)) return false;
                self._removeExceedPost();
                self.data.unshift(singleData);
                sData = JSON.stringify(self.data);
                ls.item(config.storeName,sData);
            }
            return true;
        },
        /**
         * 已经存在指定id的文章
         * @param id
         * @return {Boolean}
         */
        isExist : function(id){
            var self = this,data = self.data,exist = false,postId;
            if(data.length > 0){
                $.each(data,function(){
                    postId = this.id;
                    if(id == postId) {
                        exist = true;
                        return false;
                    }
                });
            }
            return exist;
        },
        /**
         * 清理本地数据
         */
        clear : function(){
            var self = this,config = self.config,ls = config.ls;
            ls.removeItem(config.storeName);
            self.data = [];
        },
        /**
         * 删除超过count的数据
         */
        _removeExceedPost : function(){
            var self = this,config = self.config,count = config.maxClearNumber,data = self.data;
            if(data.length < count) return false;
            self.data.splice(count-1,data.length - count + 1);
        }
    };
    //DOM加载结束后
    $(function(){
        var config = Ria.config,hook = config.hook,data = config.data,tpl = config.tpl,ls = Ria.localStorage,
            tPopup,email,$cm = $(hook.CM),$cmListCondition = $(hook.CM_LIST_CONDITION),val,
            histories,$singlePost = $(hook.SINGLE_POST),$singlePostTitle = $(hook.SINGLE_POST_TITLE),title,id,url,singleData,
            $alreadyRead = $(hook.ALREADY_READ);
        if($(hook.AUTHOR).length > 0){
            //实例化弹出层
            tPopup = new Ria.Tpopup();
            //鼠标滑过作者层
            $(hook.AUTHOR).hover(function(){
                email = $(this).attr(data.EMAIL);
                tPopup.show(this,email);
            },function(){
                tPopup.hide(this);
            });
        }
        //存在评论表单
        if($cm.length > 0){
            if (window.localStorage) {
                $(hook.CM_FIELD).bind('blur',function(){
                    ls.item($(this).attr('id'),$(this).val());
                })
                .each(function(){
                    val = ls.item($(this).attr('id'));
                    if(val != null) $(this).val(val);
                });
            }
        }
        //存在评论条件
        if($cmListCondition.length > 0){
            if(ls.item(data.COMMENT_LIST_CONDITION) == null) ls.item(data.COMMENT_LIST_CONDITION,config.commentListCondition.ALL);
            $cmListCondition.bind('change',function(){
                var val = $(this).val();
                if($(this).attr('checked')){
                    Ria.CommentList(val);
                    ls.item(data.COMMENT_LIST_CONDITION,val);
                }
            })
            .each(function(){
                var val = $(this).val();
                ls.item(data.COMMENT_LIST_CONDITION) == val && $(this).attr('checked',true);
                if($(this).attr('checked')){
                    Ria.CommentList(val);
                }
            });
        }
        //用户浏览历史
        histories = new Ria.Histories();
        //尾部显示用户浏览历史
        histories.appendTo(hook.HISTORIES);
        //给列表中文章增加已阅标示
        if($alreadyRead.length > 0){
           $alreadyRead.each(function(){
               id = Number($(this).attr(data.ID));
               if(histories.isExist(id)){
                   $(this).show();
                   $(this).parents('article').find(hook.POST_TITLE).addClass(config.cls.ALREADY_READ_TITLE);
               }
           })
        }
        //是文章页面
        if($singlePost.length > 0){
            //标题
            title = $singlePostTitle.text();
            //链接
            url = location.href;
            //id
            id = Number($singlePost.attr(data.ID));
            singleData = {'id' : id,'title' : title,'url' : url};
            //保存数据
            histories.save(singleData);
        }
    });
})(jQuery);
