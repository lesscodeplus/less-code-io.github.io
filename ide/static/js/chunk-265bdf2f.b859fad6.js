(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-265bdf2f"],{"67fa":function(e,t,s){"use strict";var o=s("8a29"),a=s.n(o);a.a},"8a29":function(e,t,s){},c870:function(e,t,s){"use strict";s.r(t);var o=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"block-editor-organism"},[s("div",{staticClass:"block-editor-organism__blockly-workspace",style:e.size,attrs:{id:"block-editor-organism__blockly"}})])},a=[],l=s("5530"),i=(s("a4d3"),s("e01a"),s("d28b"),s("99af"),s("4de4"),s("7db0"),s("4160"),s("b0c0"),s("d3b7"),s("3ca3"),s("159b"),s("ddb0"),s("96cf"),s("1da1"));function r(e){if(Array.isArray(e))return e}s("e260"),s("25f0");function c(e,t){if(Symbol.iterator in Object(e)||"[object Arguments]"===Object.prototype.toString.call(e)){var s=[],o=!0,a=!1,l=void 0;try{for(var i,r=e[Symbol.iterator]();!(o=(i=r.next()).done);o=!0)if(s.push(i.value),t&&s.length===t)break}catch(c){a=!0,l=c}finally{try{o||null==r["return"]||r["return"]()}finally{if(a)throw l}}return s}}function n(){throw new TypeError("Invalid attempt to destructure non-iterable instance")}function d(e,t){return r(e)||c(e,t)||n()}var u,h=s("d4ec"),p=s("bee2"),k=s("99de"),b=s("7e84"),E=s("257e"),v=s("262e"),f=s("ade3"),m=s("c194"),w=s("411f"),y=s("b9f5"),S=s("c7c9"),O=s("54ca"),B=s.n(O),g="block-editor-organism__blockly",T=function(e){function t(){var e,s;Object(h["a"])(this,t);for(var o=arguments.length,a=new Array(o),l=0;l<o;l++)a[l]=arguments[l];return s=Object(k["a"])(this,(e=Object(b["a"])(t)).call.apply(e,[this].concat(a))),Object(f["a"])(Object(E["a"])(s),"workspace",null),Object(f["a"])(Object(E["a"])(s),"hasData",!1),Object(f["a"])(Object(E["a"])(s),"editableLevelProperties",{api:null,allRequests:null,deployment:null,cron:null,module:null}),Object(f["a"])(Object(E["a"])(s),"isWorkspaceLoading",!1),Object(f["a"])(Object(E["a"])(s),"toolbox",null),s}return Object(v["a"])(t,e),Object(p["a"])(t,[{key:"setWorkspaceProperties",value:function(){var e,t,s,o=null===(e=this.vue.selectedItems)||void 0===e?void 0:null===(t=e.editable)||void 0===t?void 0:t.type;switch(o){case y["EDITABLE_TYPES"].DOCUMENT_LEVEL:s=this.editableLevelProperties.allRequests;break;case y["EDITABLE_TYPES"].API:s=this.editableLevelProperties.api;break;case y["EDITABLE_TYPES"].ADMIN:s=this.editableLevelProperties.deployment;break;case y["EDITABLE_TYPES"].CRON:s=this.editableLevelProperties.cron;break;case y["EDITABLE_TYPES"].MODULE:s=this.editableLevelProperties.module;break;default:s=null;break}this.actions().setSelectedBlock(s)}},{key:"addEventHandlers",value:function(){this.onGlobalEvent(w["a"].DOCUMENT.BEFORE_SAVE,this.beforeDocumentSave),this.onGlobalEvent(w["a"].DOCUMENT.ON_PROPERTIES_CHANGED,this.propertiesChanged),this.onGlobalEvent(w["a"].DOCUMENT.EDITABLE_SWITCHED,this.editableSwitched),this.onGlobalEvent(w["a"].TOOLBAR.UNDO,this.undo),this.onGlobalEvent(w["a"].TOOLBAR.REDO,this.redo)}},{key:"undo",value:function(){this.workspace.undo(!1)}},{key:"redo",value:function(){this.workspace.undo(!0)}},{key:"editableSwitched",value:function(e){switch(e.type){case y["EDITABLE_TYPES"].API:case y["EDITABLE_TYPES"].DOCUMENT_LEVEL:case y["EDITABLE_TYPES"].ADMIN:case y["EDITABLE_TYPES"].CRON:case y["EDITABLE_TYPES"].MODULE:this.updateWorkspaceFromSelectedEditable(e),this.setWorkspaceProperties();break}}},{key:"propertiesChanged",value:function(e){var t=e.editable;this.updateSelectedEditable(t)}},{key:"beforeDocumentSave",value:function(e){var t,s=e.reason,o=null===(t=this.vue.selectedItems)||void 0===t?void 0:t.editable;if(o){if(s!==w["b"].BEFORE_SAVE.USER_SAVE){var a=this.workspace.getAllBlocks();if(0!==a.length){var l=this.workspace.scrollX,i=this.workspace.scrollY;this.workspace.centerOnBlock(a[0].id);var r=this.workspace.scrollX-l,c=this.workspace.scrollY-i;o.scrollX=r,o.scrollY=c,this.workspace.scrollX=r+l,this.workspace.scrollY=c+i}else o.scrollX=this.workspace.scrollX,o.scrollY=this.workspace.scrollY}this.updateSelectedEditable(o)}}},{key:"createDocLevelBlocks",value:function(e,t){var s=this;t.forEach((function(t){var o=d(t,2),a=o[0],l=o[1];if(!s.editableLevelProperties[l]){var i=e.blocks.find((function(e){return e.name==a}));s.editableLevelProperties[l]={id:0,type:a,properties:i.properties}}}))}},{key:"getAssets",value:function(){var e=Object(i["a"])(regeneratorRuntime.mark((function e(){var t,s,o,a,l,i,r;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return t="Api",s={staticCache:!0,localStorage:!0,busyTitle:S["a"].PROGRESS_INDICATOR.LOADING_BLOCKS},e.next=4,this.backend(s).getBlocksAndToolbox(t);case 4:if(o=e.sent,a=o.result,l=o.error,l){e.next=20;break}return this.injectCustomBlocks(a.blocks),this.actions().patchSelectedItems({blocks:a.blocks}),this.toolbox=a.toolbox,i=[["$-api","api"],["$-admin","deployment"],["$-all","allRequests"],["$-cron","cron"],["$-module","module"]],e.next=14,this.backend(s).getGuides(t);case 14:r=e.sent,r.error||this.actions().setGuides(r.result),this.createDocLevelBlocks(a,i),this.toolBoxLoaded(),e.next=21;break;case 20:this.msgbox(S["a"].ERROR_MESSAGES.MESSAGE_API_BLOCKS,this.MSGBOX_TYPE.OK,S["a"].ERROR_MESSAGES.TITLE_MESSAGE_API_BLOCKS);case 21:case"end":return e.stop()}}),e,this)})));function t(){return e.apply(this,arguments)}return t}()},{key:"toolBoxLoaded",value:function(){this.initializeBlockly(),this.updateWorkspaceFromSelectedEditable(this.vue.selectedItems.editable),this.setWorkspaceProperties()}},{key:"injectCustomBlocks",value:function(e){var t=!0,s=!1,o=void 0;try{for(var a,l=e[Symbol.iterator]();!(t=(a=l.next()).done);t=!0){var i=a.value;B.a.Blocks[i.name]=function(e){return{init:function(){this.jsonInit(e.data)}}}(i)}}catch(r){s=!0,o=r}finally{try{t||null==l.return||l.return()}finally{if(s)throw o}}}},{key:"initializeBlockly",value:function(){var e=this,t={toolbox:this.toolbox,trashcan:!1,sounds:!1,zoom:!0,theme:B.a.Themes.Dark,grid:{spacing:10,length:10,colour:"rgb(42, 42, 42)"}};B.a.Scrollbar.scrollbarThickness=15,this.workspace=B.a.inject(g,t),u=this.workspace,this.workspace.addChangeListener(B.a.Events.disableOrphans),this.workspace.addChangeListener((function(t){if("ui"==t.type){if("click"==t.element){var s=e.workspace.getBlockById(t.blockId);e.actions().setSelectedBlock({id:s.id,type:s.type})}"selected"==t.element&&(B.a.selected||e.setWorkspaceProperties())}var o;"create"==t.type&&((null===B.a||void 0===B.a?void 0:null===(o=B.a.selected)||void 0===o?void 0:o.id)&&e.actions().setSelectedBlock({id:B.a.selected.id,type:B.a.selected.type}));"delete"==t.type&&(e.isWorkspaceLoading||delete e.vue.selectedItems.editable.properties[t.blockId]),"finished_loading"==t.type&&(e.isWorkspaceLoading=!1)})),document.getElementsByClassName("blocklyMainBackground")[0].style.stroke="none"}},{key:"updateWorkspaceFromSelectedEditable",value:function(e){if(e){this.isWorkspaceLoading=!0,null==this.workspace&&this.initializeBlockly(),this.workspace.clear();var t=e.workflows,s=t?t[this.vue.selectedWorkflow]:null;if(s){this.hasData=!0;var o=B.a.Xml.textToDom(s);B.a.Xml.domToWorkspace(o,this.workspace);var a=this.workspace.getAllBlocks();e.scrollX&&e.scrollY?(0!==a.length?(this.workspace.centerOnBlock(a[0].id),this.workspace.scrollX=this.workspace.scrollX-e.scrollX,this.workspace.scrollY=this.workspace.scrollY-e.scrollY):(this.workspace.scrollX=e.scrollX,this.workspace.scrollY=e.scrollY),this.workspace.resize()):0!==a.length&&this.workspace.centerOnBlock(a[0].id),this.workspace.clearUndo()}else this.hasData=!1}}},{key:"updateSelectedEditable",value:function(e){if(e&&(e.type==y["EDITABLE_TYPES"].API||y["EDITABLE_TYPES"].DOCUMENT_LEVEL)){var t=this.vue.openedDocument.editables.filter((function(t){return t.id==e.id}))[0];if(t){t.workflows||(t.workflows={});var s=this.vue.selectedWorkflow,o=B.a.Xml.workspaceToDom(this.workspace),a=B.a.Xml.domToText(o);t.workflows[s]=a,this.actions().setOpenedDocument({result:this.vue.openedDocument})}}}},{key:"resizeWorkspace",value:function(){var e=this.panels,t=e.right,s=this.compileErrors,o=661,a=61;t||(o-=300),s&&(a+=150);var l={width:"calc(100% - ".concat(o,"px)"),height:"calc(100% - ".concat(a,"px)")};if(u){var i=document.getElementById(g);i&&(i.style.width=l.width,i.style.height=l.height,B.a.svgResize(u))}return l}},{key:"resetStore",value:function(){this.actions().setSelectedBlock(null),this.actions().setGuides(null)}},{key:"resetWorkspace",value:function(){this.editableLevelProperties={api:null,allRequests:null,deployment:null,cron:null,module:null},this.hasData=!1,this.isWorkspaceLoading=!1}}]),t}(m["a"]),L=new T;L.setBackendNamespace("Pages/Editor/EditorPage").setElementName("BlockEditorOrganism");var D={name:"BlockEditorOrganism",beforeCreate:function(){L.hook(this),L.addEventHandlers()},methods:{},mounted:function(){L.getAssets()},beforeDestroy:function(){var e,t=null===(e=this.selectedItems)||void 0===e?void 0:e.editable;t&&L.updateSelectedEditable(t),L.unsubscribeGlobalEvents(),L.resetStore(),L.resetWorkspace()},data:function(){return{selectedWorkflow:"main"}},computed:Object(l["a"])({panels:function(){return this.openedDocument.selectedResources.panels},size:L.resizeWorkspace},L.getters("selectedItems","openedDocument","selectedBlock","compileErrors"))},A=D,_=(s("67fa"),s("2877")),I=Object(_["a"])(A,o,a,!1,null,"bf1dab4e",null);t["default"]=I.exports}}]);
//# sourceMappingURL=chunk-265bdf2f.b859fad6.js.map