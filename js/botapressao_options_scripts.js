/**
 * 
 */

jQuery(function()
{
	jQuery("#importcsv").click(function(event)
	{
		event.preventDefault();
		
		var data = new FormData(  );
		
		jQuery.each(jQuery('#botapressao-import-csv')[0].files, function(i, file) {
			data.append('file-'+i, file);
		});
		
		data.append('action', 'ImportarCsv');
         
        jQuery.ajax(
        {
            type: 'POST',
                    url: botapressao_options_scripts_object.ajax_url,
            data: data,
            contentType:false,
            processData:false,
            success: function(response)
            {
            	jQuery('#result').replaceWith(response);
            },
        });
	});
});