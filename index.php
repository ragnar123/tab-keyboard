<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Jquery and TagEdit</title>
<link href="jHtmlArea/jHtmlArea.css" type="text/css" rel="stylesheet" />
<link href="jHtmlArea/jHtmlArea.ColorPickerMenu.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="ui/smoothness/jquery-ui-1.8rc3.custom.css" type="text/css" media="all" />
<link rel="stylesheet" href="http://e02e3c2e19a06eec1e84-9a0707245afee0d6f567aa2987845a0f.r67.cf1.rackcdn.com/design/1375927389_jquery-ui-1.8.6.custom.css" type="text/css" media="all" />
<link rel="stylesheet" href="http://e02e3c2e19a06eec1e84-9a0707245afee0d6f567aa2987845a0f.r67.cf1.rackcdn.com/design/1375931058_jquery.tagedit.css" type="text/css" media="all" />
<script type="text/javascript" src="http://e02e3c2e19a06eec1e84-9a0707245afee0d6f567aa2987845a0f.r67.cf1.rackcdn.com/design/1375927735_jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jHtmlArea/jHtmlArea-0.7.0.js"></script>
<script type="text/javascript" src="jHtmlArea/jHtmlArea.ColorPickerMenu-0.7.0.js"></script>
<script type="text/javascript" src="js/jquery.htmlClean.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8rc3.custom.min.js"></script>
<script type="text/javascript" src="http://e02e3c2e19a06eec1e84-9a0707245afee0d6f567aa2987845a0f.r67.cf1.rackcdn.com/design/1375927686_jquery-ui-1.8.6.custom.min.js"></script>
<script type="text/javascript" src="http://e02e3c2e19a06eec1e84-9a0707245afee0d6f567aa2987845a0f.r67.cf1.rackcdn.com/design/1375927605_jquery.autogrowinput.js"></script>
<script type="text/javascript" src="http://e02e3c2e19a06eec1e84-9a0707245afee0d6f567aa2987845a0f.r67.cf1.rackcdn.com/design/1375927648_jquery.tagedit.js"></script>
<style type="text/css">
/* css for timepicker */
	.ui-timepicker-div .ui-widget-header{ margin-bottom: 8px; }
	.ui-timepicker-div dl{ text-align: left; }
	.ui-timepicker-div dl dt{ height: 25px; }
	.ui-timepicker-div dl dd{ margin: -25px 0 10px 65px; }
	.ui-timepicker-div td { font-size: 90%; }
	#pdescription1 {
		width: 700px;
		height: 350px;
	}
div.jHtmlArea .ToolBar ul li a.custom_disk_button 
        {
            background: url("http://c1779652.r52.cf0.rackcdn.com/design/1320837691_item.gif") no-repeat;
            background-position: 0 0;
        }
</style>
<script type="text/javascript">
$(function() {	
	$('input.tags_field').tagedit({
		autocompleteURL: 'tag_suggest.php',
		allowEdit: false, 
		autocompleteOptions: {minLength: 0}
	});
	$('input.tags_field_t').tagedit({
		autocompleteURL: 'tag_suggest.php',
		allowEdit: false,
		allowAdd: false,
		autocompleteOptions: {minLength: 0}
	});
	$('input.tags_field_e').tagedit({
		autocompleteURL: 'tag_suggest.php',
		allowEdit: false,
		allowAdd: false,
		autocompleteOptions: {minLength: 0}
	});
	$('input.tags_field_s').tagedit({
		autocompleteURL: 'tag_suggest.php',
		allowEdit: false,
		allowAdd: false,
		autocompleteOptions: {minLength: 0}
	});
	$("#pdescription1").htmlarea({css: "https://9427b07f4a5437661e14-c66b4a71654e62b34452716d77044231.ssl.cf1.rackcdn.com/design/1369293540_std_editor_editor.css", resizeOptions: {}, toolbar: [
        ["html"], ["bold", "italic", "underline", "strikethrough", "|", "subscript", "superscript"],
        ["increasefontsize", "decreasefontsize"],
        ["orderedlist", "unorderedlist"],
        ["indent", "outdent"],
        ["justifyleft", "justifycenter", "justifyright"],
        ["link", "unlink", "horizontalrule"],
        ["p", "h1", "h2", "h3", "h4", "h5", "h6"],
        ["cut", "copy", "paste"],
		[{
                        // This is how to add a completely custom Toolbar Button
                        css: "custom_disk_button",
                        text: "Clean MS",
                        action: function(btn) {
                            // 'this' = jHtmlArea object
                            // 'btn' = jQuery object that represents the <A> "anchor" tag for the Toolbar Button
							var nowtext = this.toHtmlString();
							var nowtext1 = nowtext.replace(/<div>/g, "<p>");
							var nowtext2 = nowtext1.replace(/<\/div>/g, "</p>");
							var finaltext = $.htmlClean( nowtext2, {format:true});
							this.editor.body.innerHTML = finaltext;
                        }
         }] 
	 ]});
});
</script>
</head>

<body>
<form action="#" name="add_page" method="post" enctype="multipart/form-data" id="add_page">

<table>
<tr>
	<td valign="top" width="210"><label for="p_title" class="tit_lab"><strong>Headline:</strong> </label></td>
<td><input name="p_title" id="p_title" type="text" style="padding: 5px 5px 0 5px; border: 1px solid #c6c6c6; width: 400px; height: 25px;" />
</td>
</tr>
</table>
<div style="clear: both;"></div>

<table>
<tr>
	<td valign="top" width="210"><label for="tags_field_s"><strong>Tag field 1:</strong></label></td>
	<td><input type="text" name="tags_field_s[]" class="tags_field_s" id="tags_field_s" autocomplete="off" />
	<div style="clear: both;"></div>
	</td>
</tr>
</table>
<div style="clear: both;"></div>
<table>
<tr>
	<td valign="top" width="210"><label for="tags_field_e"><strong>Tag field 2:</strong></label></td>
	<td><input type="text" name="tags_field_e[]" class="tags_field_e" id="tags_field_e" autocomplete="off" />
	<div style="clear: both;"></div>
	</td>
</tr>
</table>
<div style="clear: both;"></div>
<table>
<tr>
	<td valign="top" width="210"><label for="tags_field_t"><strong>Tag field 3:</strong></label></td>
	<td><input type="text" name="tags_field_t[]" class="tags_field_t" id="tags_field_t" autocomplete="off" />
	<div style="clear: both;"></div>
	</td>
</tr>
</table>
<div style="clear: both;"></div>
<table>
<tr>
	<td valign="top" width="210"><label for="tags_field"><strong>Tag field 4:</strong></label></td>
	<td><input type="text" name="tags_field[]" class="tags_field" id="tags_field" autocomplete="off" />
	<div style="clear: both;"></div>
	</td>
</tr>
</table>

<div style="clear: both;"><br /></div>

<textarea id="pdescription1" name="pdescription1" cols="50" rows="15"></textarea>

<div style="clear: both; padding: 4px;"></div>
<input type="submit" name="submit" value="Save" />
</form>
<script src="tab-keys.js"></script>
</body>
</html>
