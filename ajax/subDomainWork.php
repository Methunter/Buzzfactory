<?
#####################################################################
#  Subdomains 0,51
#  Released under the terms of the GNU General Public License.
#  Please refer to the README file for more information.
#####################################################################

#####################################################################
#  PLEASE EDIT THE FOLLOWING VARIABLES:
#####################################################################

# Your domain name. NO "www." IN FRONT OF IT. NO SLASHES ("/").
# Just the actual domain name, i.e. "yourdomain.com"
$domain = "cms.com";

# The default page that the visitors should be redirected to if
# they don't request a sub domain or they request a non-existing
# sub domain. This page could be named "welcome.html",
# "front_page.html" or something similar. The page should be
# located in your document root. If you can view the page by
# entering "http://yourdomain.com/welcome.html" in your browser,
# then it is located in the document root.
$default_page = "index.html";

# Do you want to use frames?
$use_frames = "yes";

#####################################################################
#  THAT'S IT! NO MORE EDITING NECESSARY.
#####################################################################



$underdomaene = $HTTP_HOST;
$underdomaene = eregi_replace("\.".$domain, "", $underdomaene);
$underdomaene = eregi_replace("www\.", "", $underdomaene);
$underdomaene = strtolower($underdomaene);

# If the sub domain is the name of a directory in the document root...
if (is_dir("$DOCUMENT_ROOT/$underdomaene")) {
	# The frames version:
	if ($use_frames == "yes") {
		echo "<html><head><title>$domain/$underdomaene</title>\n\n";
		echo "<!---------------------------------------------------------------------\n";
		echo "   The sub domains at $domain were created using\n";
		echo "   the PHP script \"Subdomains\"\n";
		echo "---------------------------------------------------------------------->\n\n";
		echo "</head>\n\n\n\n";
		echo "<frameset cols=100%,* frameborder=no border=0 framespacing=0>\n";
		echo "<frame src=http://$domain/$underdomaene>\n";
		echo "<noframes>\n";
		echo "<body bgcolor=black link=silver alink=black vlink=gray>\n";
		echo "<font face=helvetica color=white><center>\n";
		echo "This page uses frames, but it seems that your browser does not support this feature.\n";
		echo "To move on, click here:<br><a href=http://$domain/$underdomaene>$domain/$underdomaene</a>\n";
		echo "</center></font>\n";
		echo "</body>\n";
		echo "</noframes>\n";
		echo "</frameset></html>\n";
	}

	# The non-frames version:
	else {
		header("Location: http://$domain/$underdomaene");
	}
}

# If the sub domain is NOT the name of a directory in the document root...
else {
	if (!$REQUEST_URI || $REQUEST_URI == "/") {
		include("$DOCUMENT_ROOT/$default_page");
	}
	else {
		header("Location: http://$domain$REQUEST_URI");
	}
}
?>
