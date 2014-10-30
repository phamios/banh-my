
//####################################################
// jQuery Handle
//####################################################
(function($)
{
	$(document).ready(function()
	{
		// Uniform
		//$('.uniform').find('select, input:checkbox, input:radio, input:file').uniform();
		
		// Hide it
		$(".hideit").click(function()
		{
			$(this).fadeOut();
		});
		
		// Lightbox
		$('.lightbox').nstUI({
			method:	'lightbox'
		});
		
		// Form handle
		$('.form_action').each(function()
		{
			$(this).nstUI({
				method:	'formAction',
				formAction:	{
					field_load: $(this).attr('_field_load')
				}
			});
		});
		
		// Verify action
		$('.verify_action').nstUI({
			method:	'verifyAction'
		});
		
		// Tooltip
		$('[_tooltip]').nstUI({
			method:	'tooltip'
		});
		
		// Drop Down
		$('[_dropdown]').nstUI({
			method:	'dropdown'
		});
		
		// Placeholder
		$('input[placeholder]').nstUI({
			method:	'placeholder'
		});
		
		// Accordion
		$('.accordion').each(function()
		{
			var _t = $(this);
			_t.nstUI({
				method:	'accordion',
				accordion: {type: _t.attr('_accordion_type')}
			});
		});
		
		// Auto check pages
		$('.auto_check_pages').each(function()
		{
			auto_check_pages($(this));
		});
		
		// Autocomplete
		var cache = {}, lastXhr;
		$('.autocomplete').each(function()
		{
			var url_search = $(this).attr('_url');
			
			$(this).autocomplete(
			{
				minLength: 2,
				source: function(request, response)
				{
					var term = request.term;
					
					if (term in cache)
					{
						response(cache[term]);
						return;
					}
		
					lastXhr = $.getJSON(url_search, request, function(data, status, xhr)
					{
						cache[term] = data;
						if (xhr === lastXhr)
						{
							response(data);
						}
					});
				}
			});
		});
		
	});
})(jQuery);


//####################################################
// Main function
//####################################################
/**
 * Load ajax
 */
function load_ajax(_t)
{
	var field = jQuery(_t).attr('_field');
	var url = jQuery(_t).attr('_url');
	
	jQuery(_t).nstUI(
	{
		method:	"loadAjax",
		loadAjax:{
			url: url,
			field: {load: field+'_load', show: field+'_show'}
		}
	});
	
	return false;
}

/**
 * Gan gia tri cua cac bien vao html
 */
function temp_set_value(html, params)
{
	jQuery.each(params, function(param, value)
	{
		var regex = new RegExp('{'+param+'}', "igm");
		html = html.replace(regex, value);
	});

	return html;
}

/**
 * Copy gia tri giua 2 field
 */
function copy_value(from, to)
{
	jQuery(this).nstUI({
		method:	'copyValue',
		copyValue: {
			from: from,
			to: to
		}
	});
}

/**
 * Hien thi lightbox
 */
function lightbox(t)
{
	jQuery(t).nstUI({
		method:	'lightbox'
	});
}

/**
 * An pages khi ko co chia trang
 */
function auto_check_pages(t)
{
	if (t.find('a')[0] == undefined)
	{
		t.remove();
	}
}


/**
 * Hien thi panel cua account
 */
function load_account_panel()
{
	jQuery(this).nstUI(
	{
		method:	"loadAjax",
		loadAjax:{
			url: site_url+'user/account_panel',
			field: {load: '_', show: 'account_panel'}
		}
	});
}

/**
 * Thay doi captcha
 */
function change_captcha(field)
{
	var t = jQuery('#'+field);
	var url = t.attr('_captcha')+'?id='+Math.random();
	t.attr('src', url);
	
	return false;
}
