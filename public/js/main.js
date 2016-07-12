!function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = p + '://platform.twitter.com/widgets.js';
        fjs.parentNode.insertBefore(js, fjs);
    }
}(document, 'script', 'twitter-wjs');
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.6&appId=1039017969490591";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));




/*!***************************************************
 * mark.js v7.0.0
 * https://github.com/julmot/mark.js
 * Copyright (c) 2014–2016, Julian Motz
 * Released under the MIT license https://git.io/vwTVl
 *****************************************************/
"use strict";function _classCallCheck(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}var _extends=Object.assign||function(a){for(var b=1;b<arguments.length;b++){var c=arguments[b];for(var d in c)Object.prototype.hasOwnProperty.call(c,d)&&(a[d]=c[d])}return a},_createClass=function(){function a(a,b){for(var c=0;c<b.length;c++){var d=b[c];d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(a){return typeof a}:function(a){return a&&"function"==typeof Symbol&&a.constructor===Symbol?"symbol":typeof a};!function(a,b,c){"function"==typeof define&&define.amd?define(["jquery"],function(d){return a(b,c,d)}):"object"===("undefined"==typeof exports?"undefined":_typeof(exports))?a(b,c,require("jquery")):a(b,c,jQuery)}(function(a,b,c){var d=function(){function c(a){_classCallCheck(this,c),this.ctx=a}return _createClass(c,[{key:"log",value:function a(b){var c=arguments.length<=1||void 0===arguments[1]?"debug":arguments[1],a=this.opt.log;this.opt.debug&&"object"===("undefined"==typeof a?"undefined":_typeof(a))&&"function"==typeof a[c]&&a[c]("mark.js: "+b)}},{key:"escapeStr",value:function(a){return a.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,"\\$&")}},{key:"createRegExp",value:function(a){return a=this.escapeStr(a),Object.keys(this.opt.synonyms).length&&(a=this.createSynonymsRegExp(a)),this.opt.diacritics&&(a=this.createDiacriticsRegExp(a)),a=this.createMergedBlanksRegExp(a),a=this.createAccuracyRegExp(a)}},{key:"createSynonymsRegExp",value:function(a){var b=this.opt.synonyms;for(var c in b)if(b.hasOwnProperty(c)){var d=b[c],e=this.escapeStr(c),f=this.escapeStr(d);a=a.replace(new RegExp("("+e+"|"+f+")","gmi"),"("+e+"|"+f+")")}return a}},{key:"createDiacriticsRegExp",value:function(a){var b=["aÀÁÂÃÄÅàáâãäåĀāąĄ","cÇçćĆčČ","dđĐďĎ","eÈÉÊËèéêëěĚĒēęĘ","iÌÍÎÏìíîïĪī","lłŁ","nÑñňŇńŃ","oÒÓÔÕÕÖØòóôõöøŌō","rřŘ","sŠšśŚ","tťŤ","uÙÚÛÜùúûüůŮŪū","yŸÿýÝ","zŽžżŻźŹ"],c=[];return a.split("").forEach(function(d){b.every(function(b){if(-1!==b.indexOf(d)){if(c.indexOf(b)>-1)return!1;a=a.replace(new RegExp("["+b+"]","gmi"),"["+b+"]"),c.push(b)}return!0})}),a}},{key:"createMergedBlanksRegExp",value:function(a){return a.replace(/[\s]+/gim,"[\\s]*")}},{key:"createAccuracyRegExp",value:function(a){var b=this,c=this.opt.accuracy,d="string"==typeof c?c:c.value,e="string"==typeof c?[]:c.limiters,f="";switch(e.forEach(function(a){f+="|"+b.escapeStr(a)}),d){case"partially":return"()("+a+")";case"complementary":return"()([^\\s"+f+"]*"+a+"[^\\s"+f+"]*)";case"exactly":return"(^|\\s"+f+")("+a+")(?=$|\\s"+f+")"}}},{key:"getSeparatedKeywords",value:function(a){var b=this,c=[];return a.forEach(function(a){b.opt.separateWordSearch?a.split(" ").forEach(function(a){a.trim()&&c.push(a)}):a.trim()&&c.push(a)}),{keywords:c,length:c.length}}},{key:"getElements",value:function(){var a=void 0,b=[];return a="undefined"==typeof this.ctx?[]:this.ctx instanceof HTMLElement?[this.ctx]:Array.isArray(this.ctx)?this.ctx:Array.prototype.slice.call(this.ctx),a.forEach(function(a){b.push(a);var c=a.querySelectorAll("*");c.length&&(b=b.concat(Array.prototype.slice.call(c)))}),a.length||this.log("Empty context","warn"),{elements:b,length:b.length}}},{key:"matches",value:function(a,b){return(a.matches||a.matchesSelector||a.msMatchesSelector||a.mozMatchesSelector||a.webkitMatchesSelector||a.oMatchesSelector).call(a,b)}},{key:"matchesExclude",value:function(a,b){var c=this,d=!0,e=this.opt.exclude.concat(["script","style","title"]);return this.opt.iframes||(e=e.concat(["iframe"])),b&&(e=e.concat(["*[data-markjs='true']"])),e.every(function(b){return c.matches(a,b)?d=!1:!0}),!d}},{key:"onIframeReady",value:function(a,b,c){try{!function(){var d=a.contentWindow,e="about:blank",f="complete",g=function(){try{if(null===d.document)throw new Error("iframe inaccessible");b(d.document)}catch(a){c()}},h=function(){var b=a.getAttribute("src").trim(),c=d.location.href;return c===e&&b!==e&&b},i=function(){var b=function b(){try{h()||(a.removeEventListener("load",b),g())}catch(a){c()}};a.addEventListener("load",b)};d.document.readyState===f?h()?i():g():i()}()}catch(a){c()}}},{key:"forEachElementInIframe",value:function(a,b){var c=this,d=arguments.length<=2||void 0===arguments[2]?function(){}:arguments[2],e=0,f=function(){--e<1&&d()};this.onIframeReady(a,function(a){var d=Array.prototype.slice.call(a.querySelectorAll("*"));0===(e=d.length)&&f(),d.forEach(function(a){"iframe"===a.tagName.toLowerCase()?!function(){var d=0;c.forEachElementInIframe(a,function(a,c){b(a,c),c-1===d&&f(),d++},f)}():(b(a,d.length),f())})},function(){var b=a.getAttribute("src");c.log("iframe '"+b+"' could not be accessed","warn"),f()})}},{key:"forEachElement",value:function(a){var b=this,c=arguments.length<=1||void 0===arguments[1]?function(){}:arguments[1],d=arguments.length<=2||void 0===arguments[2]?!0:arguments[2],e=this.getElements(),f=e.elements,g=e.length,h=function(){0===--g&&c()};h(++g),f.forEach(function(c){if(!b.matchesExclude(c,d)){if("iframe"===c.tagName.toLowerCase())return void b.forEachElementInIframe(c,function(c){b.matchesExclude(c,d)||a(c)},h);a(c)}h()})}},{key:"forEachNode",value:function(a){var b=arguments.length<=1||void 0===arguments[1]?function(){}:arguments[1];this.forEachElement(function(b){for(b=b.firstChild;b;b=b.nextSibling)3===b.nodeType&&b.textContent.trim()&&a(b)},b)}},{key:"wrapMatches",value:function(a,c,d,e,f){for(var g=this.opt.element?this.opt.element:"mark",h=d?0:2,i=void 0;null!==(i=c.exec(a.textContent));)if(e(i[h])){var j=i.index;d||(j+=i[h-1].length);var k=a.splitText(j);if(a=k.splitText(i[h].length),null!==k.parentNode){var l=b.createElement(g);l.setAttribute("data-markjs","true"),this.opt.className&&l.setAttribute("class",this.opt.className),l.textContent=i[h],k.parentNode.replaceChild(l,k),f(l)}c.lastIndex=0}}},{key:"unwrapMatches",value:function(a){for(var c=a.parentNode,d=b.createDocumentFragment();a.firstChild;)d.appendChild(a.removeChild(a.firstChild));c.replaceChild(d,a),c.normalize()}},{key:"markRegExp",value:function(a,b){var c=this;this.opt=b,this.log('Searching with expression "'+a+'"');var d=0,e=function(a){d++,c.opt.each(a)};this.forEachNode(function(b){c.wrapMatches(b,a,!0,function(a){return c.opt.filter(b,a,d)},e)},function(){0===d&&c.opt.noMatch(a),c.opt.done(d)})}},{key:"mark",value:function(a,b){var c=this;this.opt=b;var d=this.getSeparatedKeywords("string"==typeof a?[a]:a),e=d.keywords,f=d.length,g=0;0===f&&this.opt.done(g),e.forEach(function(a){var b=new RegExp(c.createRegExp(a),"gmi"),d=0,h=function(a){d++,g++,c.opt.each(a)};c.log('Searching with expression "'+b+'"'),c.forEachNode(function(e){c.wrapMatches(e,b,!1,function(){return c.opt.filter(e,a,d,g)},h)},function(){0===d&&c.opt.noMatch(a),e[f-1]===a&&c.opt.done(g)})})}},{key:"unmark",value:function(a){var b=this;this.opt=a;var c=this.opt.element?this.opt.element:"*";c+="[data-markjs]",this.opt.className&&(c+="."+this.opt.className),this.log('Removal selector "'+c+'"'),this.forEachElement(function(a){b.matches(a,c)&&b.unwrapMatches(a)},function(){b.opt.done()},!1)}},{key:"opt",set:function(b){this._opt=_extends({},{element:"",className:"",exclude:[],iframes:!1,separateWordSearch:!0,diacritics:!0,synonyms:{},accuracy:"partially",each:function(){},noMatch:function(){},filter:function(){return!0},done:function(){},debug:!1,log:a.console},b)},get:function(){return this._opt}}]),c}();c.fn.mark=function(a,b){return new d(this).mark(a,b),this},c.fn.markRegExp=function(a,b){return new d(this).markRegExp(a,b),this},c.fn.unmark=function(a){return new d(this).unmark(a),this}},window,document);


$(function () {
    var token = $('meta[name=_token]').attr('content');

    /** SUPPRESSION COMMENTAIRE **/
    $(document).on('submit', 'form.delete-comment', function (e) {
        var link = $(this).attr('action'),
            $comment = $(this).parents('.box-comment');
        e.preventDefault();
        $.confirm({
            theme: 'material',
            animation: 'top',
            closeAnimation: 'bottom',
            backgroundDismiss: true,
            animationBounce: 1,
            animationSpeed: 1000,
            title: 'Suppression',
            content: 'Êtes-vous sûr de vouloir supprimer votre commentaire ?',
            confirmButton: 'Oui',
            cancelButton: 'Non',
            confirm: function () {
                $.ajax({
                    url: link,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': token},
                }).always(function (count) {
                    $comment.fadeOut();
                    $comment.parents('.comments').prev('.count').html(count);
                });
            }
        });
    });

    /** EDITION COMMENTAIRE **/
    $(document).on('click', 'button.edit-comment', function () {
        var $this = $(this),
            link = $this.attr('data-url'),
            $comment = $this.parents('.comments').find('.comment');

        if ($this.html() === 'Valider') {
            $.ajax({
                url: link,
                type: 'PUT',
                headers: {'X-CSRF-TOKEN': token},
                data: {'content': $comment.html()}
            }).done(function () {
                $comment.attr('contenteditable', false);
                $this.html('Modifier');
                $.alert({
                    theme: 'material',
                    title: 'Modification',
                    confirmButton: 'OK',
                    content: 'Votre commentaire à été modifié avec succès !',
                    autoClose: 'confirm|3000',
                });

            }).fail(function () {
                $.alert({
                    theme: 'material',
                    title: 'Erreur',
                    confirmButton: 'OK',
                    content: 'Il y a eu une erreur, veuillez réessayer plus tard !',
                    autoClose: 'confirm|3000',
                });
            });
        } else {
            $comment.attr('contenteditable', true);
            $this.html('Valider');
        }
    });

});