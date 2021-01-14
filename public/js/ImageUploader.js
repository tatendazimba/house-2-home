!function(t){var e={};function o(i){if(e[i])return e[i].exports;var a=e[i]={i:i,l:!1,exports:{}};return t[i].call(a.exports,a,a.exports,o),a.l=!0,a.exports}o.m=t,o.c=e,o.d=function(t,e,i){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(o.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var a in t)o.d(i,a,function(e){return t[e]}.bind(null,a));return i},o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="/",o(o.s=5)}({5:function(t,e,o){t.exports=o("dcVo")},dcVo:function(t,e){function o(t){return(o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}var i=function(t){if(!t||!t.inputElement||!t.inputElement.getAttribute||"file"!==t.inputElement.getAttribute("type"))throw new Error('Config object passed to ImageUploader constructor must include "inputElement" set to be an element of type="file"');this.setConfig(t);var e=this;this.config.inputElement.addEventListener("change",(function(t){for(var o=[],i=0;i<e.config.inputElement.files.length;++i)o.push(e.config.inputElement.files[i]);e.progressObject={total:parseInt(o.length,10),done:0,currentItemTotal:0,currentItemDone:0},"function"==typeof e.config.onProgress&&e.config.onProgress(e.progressObject),e.handleFileList(o,e.progressObject)}),!1),e.config.debug&&console.log("Initialised ImageUploader for "+e.config.inputElement)};i.prototype.handleFileList=function(t){var e=this;if(t.length>1){var o=t.shift();this.handleFileSelection(o,(function(){e.handleFileList(t)}))}else 1===t.length&&this.handleFileSelection(t[0],(function(){"function"==typeof e.config.onComplete&&e.config.onComplete(e.progressObject)}))},i.prototype.handleFileSelection=function(t,e){var o=document.createElement("img");this.currentFile=t;var i=new FileReader,a=this;i.onload=function(t){o.src=t.target.result,o.onload=function(){a.config.autoRotate?(a.config.debug&&console.log("ImageUploader: detecting image orientation..."),"function"==typeof EXIF.getData&&"function"==typeof EXIF.getTag?EXIF.getData(o,(function(){var t=EXIF.getTag(this,"Orientation");a.config.debug&&console.log("ImageUploader: image orientation from EXIF tag = "+t),a.scaleImage(o,e,t)})):(console.error("ImageUploader: can't read EXIF data, the Exif.js library not found"),a.scaleImage(o,e))):a.scaleImage(o,e)}},i.readAsDataURL(t)},i.prototype.drawImage=function(t,e,o,i,a,n,r,s,c,l){t.save(),void 0===a&&(a=e.width),void 0===n&&(n=e.height),void 0===l&&(l=!1),l&&(o-=a/2,i-=n/2),t.translate(o+a/2,i+n/2);var h=2*Math.PI-r*Math.PI/180;t.rotate(h),flipScale=s?-1:1,flopScale=c?-1:1,t.scale(flipScale,flopScale),t.drawImage(e,-a/2,-n/2,a,n),t.restore()},i.prototype.scaleImage=function(t,e,o){var i=document.createElement("canvas");i.width=t.width,i.height=t.height;var a=i.getContext("2d");a.save();var n=i.width,r=i.style.width,s=i.height,c=i.style.height;if(void 0===o&&(o=1),o)switch(o>4&&(i.width=s,i.style.width=c,i.height=n,i.style.height=r),o){case 2:a.translate(n,0),a.scale(-1,1);break;case 3:a.translate(n,s),a.rotate(Math.PI);break;case 4:a.translate(0,s),a.scale(1,-1);break;case 5:a.rotate(.5*Math.PI),a.scale(1,-1);break;case 6:a.rotate(.5*Math.PI),a.translate(0,-s);break;case 7:a.rotate(.5*Math.PI),a.translate(n,-s),a.scale(-1,1);break;case 8:a.rotate(-.5*Math.PI),a.translate(-n,0)}a.drawImage(t,0,0),a.restore();var l=i.width/i.height,h=Math.min(this.config.maxWidth,l*this.config.maxHeight);for(this.config.maxSize>0&&this.config.maxSize<i.width*i.height/1e6&&(h=Math.min(h,Math.floor(1e3*Math.sqrt(this.config.maxSize*l)))),this.config.scaleRatio&&(h=Math.min(h,Math.floor(this.config.scaleRatio*i.width))),this.config.debug&&(console.log("ImageUploader: original image size = "+i.width+" px (width) X "+i.height+" px (height)"),console.log("ImageUploader: scaled image size = "+h+" px (width) X "+Math.floor(h/l)+" px (height)")),h<=0&&(h=1,console.warn("ImageUploader: image size is too small"));i.width>=2*h;)i=this.getHalfScaleCanvas(i);i.width>h&&(i=this.scaleCanvasWithAlgorithm(i,h));var g=i.toDataURL("image/jpeg",this.config.quality);"function"==typeof this.config.onScale&&this.config.onScale(g),this.performUpload(g,e)},i.prototype.performUpload=function(t,e){var i,a,n=new XMLHttpRequest,r=this,s=!0,c=this.config.requestHeaders;if(n.onload=function(t){s=!1,r.uploadComplete(t,e)},n.upload.addEventListener("progress",(function(t){r.progressUpdate(t.loaded,t.total)}),!1),n.open("POST",this.config.uploadUrl,!0),"object"===o(c)&&null!==c&&Object.keys(c).forEach((function(t,e){if("string"!=typeof c[t])for(i=c[t],a=0,j=i.length;a<j;a++)n.setRequestHeader(t,i[a]);else n.setRequestHeader(t,c[t])})),n.send(t.split(",")[1]),this.config.timeout&&setTimeout((function(){s&&(n.abort(),r.uploadComplete({target:{status:"Timed out"}},e))}),this.config.timeout),this.config.debug){var l=document.createElement("img");this.config.workspace.appendChild(document.createElement("br")),this.config.workspace.appendChild(l),l.src=t}},i.prototype.uploadComplete=function(t,e){this.progressObject.done++,this.progressUpdate(0,0),e(),"function"==typeof this.config.onFileComplete&&this.config.onFileComplete(t,this.currentFile)},i.prototype.progressUpdate=function(t,e){console.log("Uploaded "+t+" of "+e),this.progressObject.currentItemDone=t,this.progressObject.currentItemTotal=e,this.config.onProgress&&this.config.onProgress(this.progressObject)},i.prototype.scaleCanvasWithAlgorithm=function(t,e){var o=document.createElement("canvas"),i=e/t.width;o.width=t.width*i,o.height=t.height*i;var a=t.getContext("2d").getImageData(0,0,t.width,t.height),n=o.getContext("2d").createImageData(o.width,o.height);return this.applyBilinearInterpolation(a,n,i),o.getContext("2d").putImageData(n,0,0),o},i.prototype.getHalfScaleCanvas=function(t){var e=document.createElement("canvas");return e.width=t.width/2,e.height=t.height/2,e.getContext("2d").drawImage(t,0,0,e.width,e.height),e},i.prototype.applyBilinearInterpolation=function(t,e,o){function i(t,e,o,i,a,n){var r=1-a,s=1-n;return t*r*s+e*a*s+o*r*n+i*a*n}var a,n,r,s,c,l,h,g,f,d,u,p,m,y,b,w,v,I,x;for(a=0;a<e.height;++a)for(r=a/o,s=Math.floor(r),c=Math.ceil(r)>t.height-1?t.height-1:Math.ceil(r),n=0;n<e.width;++n)l=n/o,h=Math.floor(l),g=Math.ceil(l)>t.width-1?t.width-1:Math.ceil(l),f=4*(n+e.width*a),d=4*(h+t.width*s),u=4*(g+t.width*s),p=4*(h+t.width*c),m=4*(g+t.width*c),y=l-h,b=r-s,w=i(t.data[d],t.data[u],t.data[p],t.data[m],y,b),e.data[f]=w,v=i(t.data[d+1],t.data[u+1],t.data[p+1],t.data[m+1],y,b),e.data[f+1]=v,I=i(t.data[d+2],t.data[u+2],t.data[p+2],t.data[m+2],y,b),e.data[f+2]=I,x=i(t.data[d+3],t.data[u+3],t.data[p+3],t.data[m+3],y,b),e.data[f+3]=x},i.prototype.setConfig=function(t){this.config=t,this.config.debug=this.config.debug||!1,this.config.quality=1,0<t.quality&&t.quality<=1&&(this.config.quality=t.quality),(!this.config.maxWidth||this.config.maxWidth<0)&&(this.config.maxWidth=1024),(!this.config.maxHeight||this.config.maxHeight<0)&&(this.config.maxHeight=1024),(!this.config.maxSize||this.config.maxSize<0)&&(this.config.maxSize=null),(!this.config.scaleRatio||this.config.scaleRatio<=0||this.config.scaleRatio>=1)&&(this.config.scaleRatio=null),this.config.autoRotate=!0,"boolean"==typeof t.autoRotate&&(this.config.autoRotate=t.autoRotate),this.config.workspace||(this.config.workspace=document.createElement("div"),document.body.appendChild(this.config.workspace))}}});