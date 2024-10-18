/*
 Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 CKEditor 4 LTS ("Long Term Support") is available under the terms of the Extended Support Model.
*/
CKEDITOR.plugins.add("panelbutton",{requires:"button",onLoad:function(){function e(c){var b=this._;b.state!=CKEDITOR.TRISTATE_DISABLED&&(this.createPanel(c),b.on?b.panel.hide():b.panel.showBlock(this._.id,this.document.getById(this._.id),4))}CKEDITOR.ui.panelButton=CKEDITOR.tools.createClass({base:CKEDITOR.ui.button,$:function(c){var b=c.panel||{};delete c.panel;this.base(c);this.document=b.parent&&b.parent.getDocument()||CKEDITOR.document;b.block={attributes:b.attributes};b.toolbarRelated=!0;this.hasArrow=
"listbox";this.click=e;this._={panelDefinition:b}},statics:{handler:{create:function(c){return new CKEDITOR.ui.panelButton(c)}}},proto:{createPanel:function(c){var b=this._;if(!b.panel){var f=this._.panelDefinition,e=this._.panelDefinition.block,k=f.parent||CKEDITOR.document.getBody(),h=CKEDITOR.document.getById(this._.id),d=this._.panel=new CKEDITOR.ui.floatPanel(c,k,f),f=d.addBlock(b.id,e),a=this,g=c.getCommand(this.command);d.onShow=function(){a.className&&this.element.addClass(a.className+"_panel");
a.setState(CKEDITOR.TRISTATE_ON);h.setAttribute("aria-expanded","true");b.on=1;a.editorFocus&&c.focus();if(a.onOpen)a.onOpen()};d.onHide=function(d){a.className&&this.element.getFirst().removeClass(a.className+"_panel");!a.modes&&g?a.setStateFromCommand(g):a.setState(a.modes&&a.modes[c.mode]?CKEDITOR.TRISTATE_OFF:CKEDITOR.TRISTATE_DISABLED);b.on=0;h.setAttribute("aria-expanded","false");if(!d&&a.onClose)a.onClose()};d.onEscape=function(){d.hide(1);a.document.getById(b.id).focus()};if(this.onBlock)this.onBlock(d,
f);f.onHide=function(){b.on=0;!a.modes&&a.command?a.setStateFromCommand(g):a.setState(CKEDITOR.TRISTATE_OFF)}}},setStateFromCommand:function(c){this.setState(c.state)}}})},beforeInit:function(e){e.ui.addHandler(CKEDITOR.UI_PANELBUTTON,CKEDITOR.ui.panelButton.handler)}});CKEDITOR.UI_PANELBUTTON="panelbutton";