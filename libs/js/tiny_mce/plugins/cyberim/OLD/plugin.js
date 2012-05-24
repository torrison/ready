(function (){
	window.CyberIM = {
		execute : function (d) {
			CKEDITOR.tools.callFunction(d.CKEditorFuncNum, d.Data, '');
		}
	}
	
	CKEDITOR.plugins.add('cyberim', {
		init: function (e){
			e.config['filebrowserImageBrowseUrl'] = CKEDITOR.basePath+'plugins/cyberim/index.php';
		}	
	});	
})()