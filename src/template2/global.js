function trim(a) {
	return a.replace(/^s*(S*(s+S+)*)s*$/, "$1");
}

function do_search()
{
	(function($)
	{
		var search = $("#search form");
		var key = search.find("#search_t");
		var kw = trim(key.val());
		
		if (!kw || kw == 'Tìm kiếm')
		{
			alert('Vui lòng nhập từ khóa tìm kiếm!');
			key.focus();
			return false;
		}
		
		search.submit();
		
	})(jQuery);
}

function login(type) {
(function($) {
if(type==undefined) type='';
	var txtUserName = $("#l_user"+type).val();
	if(!txtUserName){
		$("#l_user"+type).focus();
		$("#l_user"+type).addClass("frmerror");
		return false;
	}
	else{
		$("#l_user"+type).removeClass("frmerror");
	}
	var txtPassword = $("#l_pass"+type).val();
	if(!txtPassword){
		$("#l_pass"+type).focus();
		$("#l_pass"+type).addClass("frmerror");
		return false;
	}
	else{
		$("#l_pass"+type).removeClass("frmerror");
	}
	var remember = $("#lp_rmb"+type).attr("checked");
		//$("login_loading"+type).css("visibility","inherit");
		$("#btnLogin"+type).attr("disabled",true);
		var data= 'txtUserName='+txtUserName+'&txtPassword='+txtPassword+'&remember='+remember;
		$.ajax({
			url: '/user/login.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
			//$("login_loading"+type).css("visibility","hidden");
				if(html==1){
					$('#user').html('<p>Đăng nhập thành công. Hãy đợi.. <img src="/css/images-1/loading.gif"></p>');
					if(type=='_r') {
						if (redirect != '') {
							window.location = redirect;
						}
						else {
							window.location.reload();
						}
					}
					window.setTimeout("window.location.reload()",1000);
					//window.setTimeout("$('#user').load('http://phimhd.vn/user/start.cache1')",1000);
					
				}else if(html.indexOf('kichhoat') != -1){
					var xxx = html.replace('kichhoat','');
					popup(xxx);
					window.setTimeout("$('#user').load('/user/start.cache1')",1000);
					
				}else if(html.indexOf('hethan') != -1){
					var xxx = html.replace('hethan','');
					popup(xxx);
					window.setTimeout("$('#user').load('/user/start.cache1')",1000);
					
				}else if (html)
				{
					popup(html);
					//$("#btnLogin"+type).attr("disabled",false);
					//$('#user').html('<p>Đăng nhập thành công. Hãy đợi.. <img src="/css/images-1/loading.gif"></p>');
					if(type=='_r') {
						if (redirect != '') {
							window.location = redirect;
						}
						else {
							window.location.reload();
						}
					}
					window.setTimeout("$('#user').load('/user/start.cache1')",0);
				}else {
					alert('Sorry, unexpected error. Please try again later.');
					$("#btnLogin"+type).attr("disabled",false);
				}
			}
		});
	return false;
})(jQuery);
}
function logout()
{
	$('#user').load('/user/logout.cache1');
	window.setTimeout("window.location.reload()",1000);
}

function register() {
(function($) {
	var name = $("#username").val();
	var password = $("#password").val();
	var email = $("#email").val();
	var fullname = $("#fullname").val();
	var dob = $("#dob").val();
	var gender = $("#gender").val();
	var yahoo = $("#yahoo").val();
	var facebook = $("#facebook").val();
	var city = $("#city").val();
	var phone = $("#phone").val();
	var data = 'btnRegister=1&name='+name+'&password='+password+'&email='+email+'&fullname='+fullname+'&dob='+dob+'&gender='+gender+'&yahoo='+yahoo+'&facebook='+facebook+'&city='+city+'&phone='+phone;
	$("#signupsubmit").attr("disabled",true);
		$.ajax({
			url: '/user/register.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
				$("#reg_loading").hide();
				$("#signupsubmit").attr("disabled",false);
				if (html=='1') {
					alert("Đăng kí tài khoản thành công.\r\n Hãy kích hoạt tài khoản để xem đầy đủ tất cả các phim trên hệ thống PhimHD.vn! Xin cảm ơn!");
					window.location = '/kich-hoat.html';
				}else if(html) {
					alert(html);
					//$('#sec_num').focus();
					window.location.reload();
				} else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}		
		});
return false;
})(jQuery);
}

function do_edit() {
(function($) {
	var name = $("#username").val();
	var password = $("#password").val();
	var email = $("#email").val();
	var fullname = $("#fullname").val();
	var dob = $("#dob").val();
	var gender = $("#gender").val();
	var yahoo = $("#yahoo").val();
	var facebook = $("#facebook").val();
	var city = $("#city").val();
	var phone = $("#phone").val();
	var avatar = $("#avatar").val();
	var data = 'name='+name+'&password='+password+'&email='+email+'&fullname='+fullname+'&dob='+dob+'&gender='+gender+'&yahoo='+yahoo+'&facebook='+facebook+'&city='+city+'&phone='+phone+'&avatar='+avatar;
	$("#editsubmit").attr("disabled",true);
		$.ajax({
			url: '/user/edit.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
				$("#editsubmit").attr("disabled",false);
				if (html=='1') {
					alert("Chỉnh sửa thông tin thành công!");
					window.location.href = '/user/info.html';
				} else if(html) {
					alert(html);
					$("#editsubmit").attr("disabled",false);
					//$('#sec_num').focus();
				} else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}		
		});
return false;
})(jQuery);
}

function forgot() {
(function($) {
	var name = $("#username").val();
	var email = $("#email").val();
	var data = 'u='+name+'&m='+email;
	$("#forgotsubmit").attr("disabled",true);
		$.ajax({
			url: '/user/forgot.cache1',	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {
				$("#forgotsubmit").attr("disabled",false);
				if (html=='1') {
					alert("Một email đã được gửi đến "+email+". Hãy kiểm tra mail để tiếp tục!");
					window.location.href = 'http://phimhd.vn';
				} else if(html) {
					alert(html);
					//$('#sec_num').focus();
				} else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}		
		});
return false;
})(jQuery);
}

function do_like(i,j) {
	if (j==''){
		alert('Bạn cần đăng nhập để có thể thực hiện chức năng này');
		return false;
	}
	var ur= '/user/'+j+'-like-'+i+'.cache1';
		$.ajax({
			url: ur,	
			type: "POST",	
			cache: false,
			success: function (html) {
				if(html){
					$('#count-like').html(html);
					show_like();
					$('#like-btn').hide();
				}else {
					alert('Sorry, unexpected error. Please try again later.');
				}
			}
		});
}
function show_like()
{
	$('#like').addClass('show');
}
function report_broken(ten)
{
		$.ajax({
			url: '/bao-loi/'+ten+'.cache3',	
			type: "GET",
			cache: false,
			success: function (html) {
				if(html==1){
					popup('Cảm ơn bạn đã thông báo cho chúng tôi lỗi của bộ phim này.!');
				}else {
					popup('Có lỗi, hãy thử lại sau.!');
				}
			}
		});
}
function do_XPcode()
{
	var code = $("#txtXPcode").val();
	var data = 'maxemphim='+code;
		$.ajax({
			url: '/user/maxemphim.cache1',
			type: "POST",
			data: data,
			cache: false,
			success: function (html) {
				if(html==1){
					alert('Nhập mã thành công. Xin hãy đợi hệ thống kiểm tra!');
					window.location.reload();
				}else {
					popup('Có lỗi, hãy thử lại sau.!');
				}
			}
		});
}
function request_login(next)
{
	redirect=next;
	var data = '<div class="login"><h2>Đăng nhập để xem phim</h2><p>Chưa có tài khoản? Hãy <a href="javascript:request_register()">đăng kí</a> một tài khoản.</p><div class="form"><p><label for="l_user_r">Username</label> <span><input class="text" id="l_user_r" type="text"></span></p><p><label for="l_pass_r">Password</label> <span><input id="l_pass_r" class="text" type="password"></span></p><p class="submit"><span><input type="checkbox" id="lp_rmb_r" value="1"><label for="lp_rmb_r">Ghi nhớ</label></span> <span class="button"><button type="submit" onclick="login(\'_r\')" id="btnLogin_r">Đăng nhập</button>&nbsp; <button onClick="hide_popup()">Hủy</button></span> <span><a href="javascript:fgt_pass()">Quên mật khẩu</a></span></p></div><script>$(\'#l_pass_r\').keypress(function(event){if (event.which == 13) {login(\'_r\');}});</script></div>';

	popup(data);
}
function request_register()
{
	
	var data = '<script id="demo" type="text/javascript">\r\n$().ready(function() {\r\n// validate signup form on keyup and submit\r\nvar validator = $("#signupform").validate({\r\nrules: {\r\nusername: {\r\nrequired: true,\r\nminlength: 2,\r\nremote: {\r\nurl: "http://phimhd.vn/user/valid.cache1",\r\ntype: "POST",\r\ncache: false\r\n}\r\n},\r\npassword: {\r\nrequired: true,\r\nminlength: 5\r\n},\r\npassword_confirm: {\r\nrequired: true,\r\nminlength: 5,\r\nequalTo: "#password"\r\n},\r\nemail: {\r\nrequired: true,\r\nemail: true,\r\nremote: {\r\nurl: "http://phimhd.vn/user/valid.cache1",\r\ntype: "POST",\r\ncache: false\r\n}\r\n},\r\nfullname: "required",\r\ndob: "required",\r\ngender: "required",\r\ncity: "required",\r\nphone: "required",\r\n},\r\nmessages: {\r\nusername: {\r\nrequired: "Vui lòng nhập username",\r\nminlength: jQuery.format("Username cần ít nhất {0} kí tự"),\r\n//remote: jQuery.format("{0} đã có người sử dụng, vui lòng chọn tên khác")\r\n},\r\npassword: {\r\nrequired: "Vui lòng nhập mật khẩu",\r\nrangelength: jQuery.format("Mật khẩu cần ít nhất {0} kí tự")\r\n},\r\npassword_confirm: {\r\nrequired: "Vui lòng nhập lại mật khẩu",\r\nminlength: jQuery.format("Mật khẩu cần ít nhất {0} kí tự"),\r\nequalTo: "Mật khẩu không chính xác"\r\n},\r\nemail: {\r\nrequired: "Vui lòng nhập email",\r\nminlength: "Vui lòng nhập email chính xác",\r\n//remote: jQuery.format("{0} đã có người sử dụng, vui lòng dùng email khác")\r\n},\r\nfullname: "Vui lòng nhập họ và tên",\r\ndob: "Vui lòng chọn năm sinh",\r\ngender: "Vui lòng chọn giới tính",\r\ncity: "Vui lòng chọn thành phố",\r\nphone: "Vui lòng nhập số điện thoại",\r\n},\r\n// the errorPlacement has to take the table layout into account\r\nerrorPlacement: function(error, element) {\r\nerror.appendTo( element.parent().next() );\r\n},\r\n// specifying a submitHandler prevents the default submit, good for the demo\r\nsubmitHandler: function() {\r\nreturn register();\r\n},\r\n// set this class to error-labels to indicate valid fields\r\nsuccess: function(label) {\r\n// set &nbsp; as text for IE\r\nlabel.html("");\r\n}\r\n});\r\n});\r\n</script>\r\n\r\n<h1 class="title font-1">Đăng ký thành viên</h1>\r\n           <form method="post" onsubmit="return false;" id="signupform">\r\n<div class="form">\r\n<p>\r\n<label for="username">Tên đăng nhập</label>\r\n<span><input type="text" class="text" id="username" maxlength="50" size="30" name="username"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="password">Mật khẩu</label>\r\n<span><input class="text" id="password" maxlength="50" size="30" name="password" type="password"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="password_confirm">Xác nhận mật khẩu</label>\r\n<span><input class="text" id="password_confirm" maxlength="50" size="30" name="password_confirm" type="password"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="email">Email</label>\r\n<span><input type="text" class="text" id="email" maxlength="50" size="30" name="email"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="fullname">Họ và tên</label>\r\n<span><input type="text" class="text" id="fullname" maxlength="50" size="30" name="fullname"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="dob">Năm sinh</label>\r\n<span><select name="dob" id="dob"><option value="2005">2005</option>\r\n<option value="2004">2004</option>\r\n<option value="2003">2003</option>\r\n<option value="2002">2002</option>\r\n<option value="2001">2001</option>\r\n<option value="2000">2000</option>\r\n<option value="1999">1999</option>\r\n<option value="1998">1998</option>\r\n<option value="1997">1997</option>\r\n<option value="1996">1996</option>\r\n<option value="1995">1995</option>\r\n<option value="1994">1994</option>\r\n<option value="1993">1993</option>\r\n<option value="1992">1992</option>\r\n<option value="1991">1991</option>\r\n<option value="1990">1990</option>\r\n<option value="1989">1989</option>\r\n<option value="1988">1988</option>\r\n<option value="1987">1987</option>\r\n<option value="1986">1986</option>\r\n<option value="1985">1985</option>\r\n<option value="1984">1984</option>\r\n<option value="1983">1983</option>\r\n<option value="1982">1982</option>\r\n<option value="1981">1981</option>\r\n<option value="1980">1980</option>\r\n<option value="1979">1979</option>\r\n<option value="1978">1978</option>\r\n<option value="1977">1977</option>\r\n<option value="1976">1976</option>\r\n<option value="1975">1975</option>\r\n<option value="1974">1974</option>\r\n<option value="1973">1973</option>\r\n<option value="1972">1972</option>\r\n<option value="1971">1971</option>\r\n<option value="1970">1970</option>\r\n<option value="1969">1969</option>\r\n<option value="1968">1968</option>\r\n<option value="1967">1967</option>\r\n<option value="1966">1966</option>\r\n<option value="1965">1965</option>\r\n<option value="1964">1964</option>\r\n<option value="1963">1963</option>\r\n<option value="1962">1962</option>\r\n<option value="1961">1961</option>\r\n<option value="1960">1960</option>\r\n<option value="1959">1959</option>\r\n<option value="1958">1958</option>\r\n<option value="1957">1957</option>\r\n<option value="1956">1956</option>\r\n<option value="1955">1955</option>\r\n<option value="1954">1954</option>\r\n</select></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="gender">Giới tính</label>\r\n<span><select name="gender" id="gender" class="textbox"><option value="">Chưa biết</option><option value="1">Nam</option><option value="2">Nữ</option></select></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="yahoo">Yahoo</label>\r\n<span><input type="text" class="text" id="yahoo" maxlength="50" size="30" name="yahoo"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p><p>\r\n<label for="facebook">Facebook</label>\r\n<span><input type="text" class="text" id="facebook" maxlength="50" size="30" name="facebook"></span>\r\n<span class="status"></span>\r\n</p>\r\n<p>\r\n<label for="city">Tỉnh/Thành phố</label>\r\n<span><select name="city" class="textbox" id="city"><option value="1">Hà Nội</option><option selected="selected" value="2">Hồ Chí Minh</option><option value="3">An Giang</option><option value="4">Bà Rịa Vũng Tàu</option><option value="5">Bình Dương</option><option value="6">Bình Phước</option><option value="7">Bình Thuận</option><option value="8">Bình Định</option><option value="9">Bạc Liêu</option><option value="10">Bắc Giang</option><option value="11">Bắc Kạn</option><option value="12">Bắc Ninh</option><option value="13">Bến Tre</option><option value="14">Cao Bằng</option><option value="15">Cà Mau</option><option value="16">Cần Thơ</option><option value="17">Điện Biên</option><option value="18">Đồng Tháp</option><option value="19">Đà Nẵng</option><option value="20">Đăk Nông</option><option value="21">Đồng Nai</option><option value="22">Đăk Lăk</option><option value="23">Gia Lai</option><option value="24">Hòa Bình</option><option value="25">Hà Giang</option><option value="26">Hà Nam</option><option value="27">Hà Tĩnh</option><option value="28">Hưng Yên</option><option value="29">Hải Dương</option><option value="30">Hải Phòng</option><option value="31">Hậu Giang</option><option value="32">Khánh Hòa</option><option value="33">Kiên Giang</option><option value="34">Kontum</option><option value="35">Lai Châu</option><option value="36">Long An</option><option value="37">Lào Cai</option><option value="38">Lâm Đồng</option><option value="39">Lạng Sơn</option><option value="40">Nam Định</option><option value="41">Nghệ An</option><option value="42">Ninh Bình</option><option value="43">Ninh Thuận</option><option value="44">Phú Thọ</option><option value="45">Phú Yên</option><option value="46">Quảng Bình</option><option value="47">Quảng Nam</option><option value="48">Quảng Ngãi</option><option value="49">Quảng Ninh</option><option value="50">Quảng Trị</option><option value="51">Sóc Trăng</option><option value="52">Sơn La</option><option value="53">Thanh Hoá</option><option value="54">Thái Bình</option><option value="55">Thái Nguyên</option><option value="56">Thừa Thiên Huế</option><option value="57">Tiền Giang</option><option value="58">Trà Vinh</option><option value="59">Tuyên Quang</option><option value="60">Tây Ninh</option><option value="61">Vĩnh Long</option><option value="62">Vĩnh Phúc</option><option value="63">Yên Bái</option></select></span>\r\n<span class="status"></span>\r\n</p>\r\n  <p>\r\n<label for="phone">Điện thoại</label>\r\n<span><input type="text" class="text" id="phone" maxlength="50" size="30" maxlength="20" name="phone"></span>\r\n<span class="status"></span>\r\n</p>\r\n<div class="warning entry">\r\n                           <p><strong>Quy định khi đăng kí :</strong></p>\r\n                           \r\n\r\n                         <ul>\r\n                           <li>Không chửi bới, kích động, lôi kéo, bôi nhọ các thành viên khác.</li>\r\n                           <li>Không nói tục chửi bậy khi bình luận.</li>\r\n                           <li>Những thành viên cố tình vi phạm hoặc vi phạm nhiều lần quy định sẽ bị loại ra khỏi club.</li>\r\n                           <li>Không chấp nhận bất cứ thông tin nào đi ngược lại với thuần phong mỹ tục và truyền thống văn hoá của nước Việt Nam.</li>\r\n                           <li>Mọi bài viết có nội dung hoặc chứa liên kết đến các trang web có nội dung vi phạm những điều trên đều sẽ được xóa mà không cần thông báo trước.</li>\r\n                           \r\n                         </ul>\r\n                       </div>\r\n\r\n<div class="submit">\r\n<p><button type="submit" id="signupsubmit">Đăng ký</button></p> \r\n</div>\r\n  \r\n</div>\r\n</form>';
		
	popup(data);
	
}
function fgt_pass()
{
	var data = '<form method="post" onsubmit="return false;" id="forgotform"><div class="form"><p><label for="username">Tên đăng nhập</label><span><input type="text" class="text" id="username" maxlength="50" size="30" name="username"></span><span class="status"></span></p><p><label for="email">Email</label><span><input type="text" class="text" id="email" maxlength="50" size="30" name="email"></span><span class="status"></span></p><div class="submit"><p><button type="submit" id="forgotsubmit" onclick="forgot()">Reset mật khẩu</button></p> </div></div></form>'
	popup(data);
}