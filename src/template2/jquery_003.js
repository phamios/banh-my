﻿(function($)
{
	$.fn.nstUI = function(user_setting)
	{
		var m_default = {
			method:	'',
			tableRowCss: {even:'even', odd:'odd'},
			lightbox: {opacity: 0.75},
			loadAjax: {url:'', data:'', field:{load:'', show:''}, datatype:'html', event_complete:'', event_error:''},
			formAction: {field_load:'', submit:false, event_submit:'', event_error:'', event_complete:'', loading:false},
			verifyAction: {field:'', event_complete:''},
			placeholder: {},
			toggleTab: {field:'', effect:'', duration:0},
			tooltip: {},
			dropdown: {},
			copyValue: {from:'', to:''},
			accordion: {type:''},
			tabs: {effect:'', duration:0}
		};

		var m_settings = $.extend({}, m_default, user_setting);
		
		return $(this).each(function()
		{
			var _t = $(this);
			switch (m_settings.method)
			{
				case 'tableRowCss':
				{
					tableRowCssHandle();
					break;
				}
				case 'lightbox':
				{
					lightboxHandle();
					break;
				}
				case 'loadAjax':
				{
					loadAjaxHandle();
					break;
				}
				case 'formAction':
				{
					// Neu thuc hien submit form luon
					if (m_settings.formAction.submit)
					{
						formActionHandle();
					}
					// Submit qua form submit
					else
					{
						_t.submit(formActionHandle);
						_t.find('input[type=submit]').click(formActionHandle);
						_t.find('[_autocheck]').change(ajaxFormAutoCheckHandle);
					}
					break;
				}
				case 'verifyAction':
				{
					_t.click(verifyActionHandle);
					break;
				}
				case 'placeholder':
				{
					placeholderHandle();
					break;
				}
				case 'toggleTab':
				{
					toggleTabHandle();
					_t.change(function()
					{
						toggleTabHandle()
					});
					break;
				}
				case 'tooltip':
				{
					tooltipHandle();
					break;
				}
				case 'dropdown':
				{
					dropDownHandle();
					break;
				}
				case 'copyValue':
				{
					copyValueHandle();
					break;
				}
				case 'accordion':
				{
					accordionHandle();
					break;
				}
				case 'tabs':
				{
					tabsHandle();
					break;
				}
				default:
				{
					alert("Không tìm thấy thuộc tính: " + m_settings.method);
					break;
				}
			}
			
			/**
			 * Table row css
			 */
			function tableRowCssHandle()
			{
				_t.find("tr:even").addClass(m_settings.tableRowCss.even);
				_t.find("tr:odd").addClass(m_settings.tableRowCss.odd);
			}
			
			/**
			 * LightBox
			 */
			function lightboxHandle()
			{
				var lightbox_setting = new Array();
				
				var url = _t.attr('href');
				var url_arr = url.split('?lightbox&');
				if (url_arr[1])
				{
					var settings = url_arr[1].split('&');
					for (var i = 0; i < settings.length; i++)
					{
						var key_value = settings[i].split('=');
						if (key_value[1])
						{
							if (key_value[1] == 'true') key_value[1] = true;
							else if(key_value[1] == 'false') key_value[1] = false;
							
							lightbox_setting[key_value[0]] = key_value[1];
						}
					}
				}
				lightbox_setting['href'] = url_arr[0];
				
				m_settings.lightbox = $.extend({}, m_default.lightbox, lightbox_setting);
				_t.colorbox(m_settings.lightbox);
				
				return false;
			}
			
			/**
			 * Load Ajax
			 */
			function loadAjaxHandle()
			{
				var url = m_settings.loadAjax.url;
				var field = m_settings.loadAjax.field;
				
				if (!url) return false;
				
				loader('show', field.load);
				
				$.post(url, m_settings.loadAjax.data, function(data)
				{
					loader('hide', field.load);
					loader('result', field.show, data);
					
					if (typeof m_settings.loadAjax.event_complete == "function")
					{
						m_settings.loadAjax.event_complete.call(this, data, m_settings.loadAjax);
					}
				}, m_settings.loadAjax.datatype)
				.error(function()
				{
					loader('hide', field.load);
					loader('error', field.show, url);
					
					if (typeof m_settings.loadAjax.event_error == "function")
					{
						m_settings.loadAjax.event_error.call(this, m_settings.loadAjax);
					}
				});
				
				return false;
			}
			
			
			/**
			 * Ajax Form Auto Check
			 */
			function ajaxFormAutoCheckHandle()
			{
				var _this = $(this);
				
				var name = _this.attr('name');
				if (!name) return;
				
				var value = _this.attr('value');
				value = (!value) ? '' : value;
				
				// Hien thi loader
				var autocheck = _t.find('[name='+name+'_autocheck]')
				autocheck.html('<div id="loader"></div>').show();
				
				// Lay url va cac bien
				var action = _t.attr('action');
				action = (action == undefined || action == '') ? window.location.href : action;
				var params = '_autocheck='+name+'&'+_t.serialize();
				
				// Load va xu ly du lieu
				$.post(action, params, function(data)
				{
					var error = _t.find('[name='+name+'_error]');
					
					if (data.accept)
					{
						autocheck.html('<div id="accept"></div>').show();
						error.html(data.error).hide('blind');
					}
					else
					{
						autocheck.html('<div id="error"></div>').show();
						error.html(data.error).show('blind', 200);
					}
				}, 'json')
				.error(function(xhr, ajaxOptions, thrownError)
				{
					var error = _t.find('[name='+name+'_error]');
					
                    autocheck.hide();
                    error.hide();
				});
			}
			
			/**
			 * Form Action
			 */
			function formActionHandle()
			{
				// Neu form dang xu ly thi bo qua
				if (m_settings.formAction.loading)
				{
					return false;
				}
				
				// Set trang thai loading
				m_settings.formAction.loading = true;
				
				// Hien thi loader
				loader('show', m_settings.formAction.field_load);
				
				// Tao event submit
				if (typeof m_settings.formAction.event_submit == "function")
				{
					m_settings.formAction.event_submit.call(this, m_settings.formAction);
				}
				
				// Lay action va params
				var action = _t.attr('action');
				action = (action == undefined || action == '') ? window.location.href : action;
				var params = '_submit=true&'+_t.serialize();
				
				// Load du lieu va xu ly
				$.post(action, params, function(data)
				{
					formActionResultHandle(data);
				}, 'json')
				.error(function(xhr, ajaxOptions, thrownError)
				{
                    //alert(xhr.responseText);
					formActionResultHandle();
				});
				
				return false;
			}
			
			function formActionResultHandle(data)
			{
				// Reset trang thai loading
				m_settings.formAction.loading = false;
				
				// An loader
				loader('hide', m_settings.formAction.field_load);
				
				// Neu ajax bi loi
				if (data == undefined)
				{
					alert('Có lỗi xẩy ra trong qua trình xử lý');
					return;
				}
				
				// Neu xu ly du lieu thanh cong
				if (data.complete)
				{
					// Tao event complete
					if (typeof m_settings.formAction.event_complete == "function")
					{
						m_settings.formAction.event_complete.call(this, data, m_settings.formAction);
					}
					
					// Chuyen trang neu duoc khai bao
					else if (data.location != undefined)
					{
						if (data.location)
						{
							window.parent.location = data.location;
						}
						else
						{
							window.location.reload();
						}
					}
				}
				
				// Neu khong thanh cong
				else
				{
					// Reset cac thong bao loi cu
					_t.find('[name$=_error]').html('').hide();
					
					// Hien thi thong bao loi hien tai
					$.each(data, function(param, value)
					{
						if (value)
						{
							_t.find('[name='+param+'_error]').html(value).show('blind', 200);
						}
					});
					
					// Tao event error
					if (typeof m_settings.formAction.event_error == "function")
					{
						m_settings.formAction.event_error.call(this, data, m_settings.formAction);
					}
				}
			}
			
			
			/**
			 * Verify Action Handle
			 */
			function verifyActionHandle()
			{
				var field = m_settings.verifyAction.field;
				field = (!field) ? 'verify_action' : field;
				var html = $('#'+field);
				
				var url = $(this).attr('_url');
				url = (!url) ? $(this).attr('href') : url;
				
				html.find('#notice').html($(this).attr('notice'));
				html.find('#accept').attr('url', url);
				
				$.colorbox({inline:true, href:'#'+field, opacity:0.75});

				html.find('#accept').click(function()
				{
					var url = $(this).attr('url');
					if (!url)
					{
						$.colorbox.close();
						return false;
					}
		
					$(this).nstUI({
						method:	"loadAjax",
						loadAjax:{
							url: url,
							field: {load: field+'_load'},
							event_complete: function(data, settings)
							{
								$.colorbox.close();
								
								if (typeof m_settings.verifyAction.event_complete == "function")
								{
									m_settings.verifyAction.event_complete.call(this, data, m_settings.verifyAction);
								}
								else
								{
									window.location.reload();
								}
							},
							event_error: function(settings)
							{
								$.colorbox.close();
							}
						}
					});

					return false;
				});
		
				html.find('#cancel').click(function()
				{
					$.colorbox.close();
					return false;
				});
				
				return false;
			}
			
			
			/**
			 * Placeholder Handle
			 */
			function placeholderHandle()
			{
				if (!_t.val())
				{
					var placeholder = _t.attr('placeholder');
					_t.val(placeholder);
				}
				
				_t.focus(function()
				{
					var placeholder = _t.attr('placeholder');
					if (_t.val() == placeholder)
					{
						_t.val('');
					}
				}).blur(function()
				{
					if (!_t.val())
					{
						var placeholder = _t.attr('placeholder');
						_t.val(placeholder);
					}
				});
			}
			
			
			/**
			 * Toggle Tab Handle
			 */
			function toggleTabHandle()
			{
				var field = m_settings.toggleTab.field;
				var effect = m_settings.toggleTab.effect;
				var duration = m_settings.toggleTab.duration;
				var _tab = $('#'+field);
				effect = (!effect) ? 'blind' : effect;
				duration = (!duration) ? 300 : duration;

				// An tab chinh
				_tab.hide(effect, duration, function()
				{
					// Hien thi tab duoc chon
					var value = _t.val();
					if (value != '')
					{
						// An tat ca cac tab con
						_tab.find('[_'+field+']').hide();

						// Hien thi tab hien tai
						_tab.find('[_'+field+'='+value+']').show();

						// Hien thi tab chinh
						_tab.show(effect, duration);
					}
				});
			}
			
			
			/**
			 * Tooltip Handle
			 */
			function tooltipHandle()
			{
				_t.hover(function()
				{ 
					var field = _t.attr('_tooltip');
					_t.find('#'+field).stop(true, true).slideDown(200);
				},
				function()
				{
					var field = _t.attr('_tooltip');
					_t.find('#'+field).stop(true, true).slideUp(200);
				});
			}
			
			
			/**
			 * Drop Down Handle
			 */
			function dropDownHandle()
			{
				var field = '#'+_t.attr('_dropdown');
				var obj = $(field);
				
				var effect = _t.attr('_dropdown_effect');
				effect = (!effect) ? 'blind' : effect;
				
				// Toggle field
				_t.click(function()
				{
					obj.stop(true, true).toggle(effect, 200);
				});
				
				// An field neu click vao vi tri khac nam ngoai field hien tai
				$(document).bind('click', function(e)
				{
					if (obj.css('display') == 'none')
					{
						return;
					}
					
					var target = e.target;
					if (_t[0] != target && _t.find(target)[0] == undefined && obj[0] != target && obj.find(target)[0] == undefined)
					{
						obj.stop(true, true).hide(effect, 200);
					};
				});
			}
			
			
			/**
			 * Copy Value Handle
			 */
			function copyValueHandle()
			{
				var f = $('#'+m_settings.copyValue.from);
				var t = $('#'+m_settings.copyValue.to);

				f.find('[_param]').each(function()
				{
					var param = $(this).attr('_param');
					var val = $(this).val();
					t.find('[_param='+param+']').val(val);
				});
				
				return false;
			}
			
			
			/**
			 * Accordion Handle
			 */
			function accordionHandle()
			{
				_t.find('[_title]').click(function()
				{
					var _this = $(this);
					var tab = _this.attr('_title');
					
					switch (m_settings.accordion.type)
					{
						case '2':
						{
							_this.toggleClass('acc_active');
							_t.find('[_title][_title!='+tab+']').removeClass('acc_active');
							
							_t.find('[_body='+tab+']').stop(true, true).slideToggle();
							_t.find('[_body][_body!='+tab+']').stop(true, true).slideUp();
							break;
						}
						
						default:
						{
							_this.toggleClass('acc_active').siblings('[_title]').removeClass('acc_active');
							_this.siblings('[_body='+tab+']').stop(true, true).slideToggle().siblings('[_body]').stop(true, true).slideUp();
							break;
						}
					}
					
					return false;
				});
			}
			
			
			/**
			 * Tabs Handle
			 */
			function tabsHandle()
			{
				var effect = m_settings.tabs.effect;
				var duration = m_settings.tabs.duration;
				
				var tab = _t.find('.tab.active').attr('id');
				tab = (!tab) ? _t.find('.tab:first').attr('id') : tab;
				tabs_change(tab);
				
				_t.find('.tab').click(function()
				{
					if (!$(this).hasClass('active'))
					{
						var tab = $(this).attr('id');
						tabs_change(tab)
					}
					
					return false;
				});
				
				function tabs_change(tab)
				{
					_t.find('.tab').removeClass('active'); //Remove any 'active' class
					_t.find('.tab#'+tab).addClass('active'); //Add 'active' class to selected tab
					
					_t.find('.tab_content').hide(); //Hide all content
					_t.find('.tab_content#'+tab+'_content').show(effect, duration); //Show the active content
				}
			}
			
			
			/**
			 * Loader handle
			 */
			function loader(action, field, data)
			{
				switch (action)
				{
					case 'show':
					{
						if (!field)
						{
							$('body').append('<div id="overlay"></div><div id="preloader">Working..</div>');
							$('#overlay, #preloader').hide().fadeIn('fast');
						}
						else
						{
							$("#"+field).html('<div id="loader"></div>').hide().fadeIn('fast');
						}
						break;
					}
					case 'hide':
					{
						if (!field)
						{
							$('#overlay, #preloader').fadeOut('fast', function(){$(this).remove()});
						}
						else
						{
							$("#"+field).fadeOut('fast');
						}
						break;
					}
					case 'result':
					{
						if (!field) return;
						$("#"+field).html(data).hide().fadeIn('fast');
						break;
					}
					case 'error':
					{
						if (!field) return;
						$("#"+field).html('Không tìm thấy liên kết: <b>'+data+'</b>').hide().fadeIn('fast');
						break;
					}
				}
			}
			
		});
	}
})(jQuery);