<?xml version="1.0" encoding="ISO-8859-1"?>
<!-- Generated by Hand -->
<!--
Copyright (C) 2011 Julia Longtin <julia.longtin@gmail.com>

This program is free software; you can redistribute it and/or
Modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
 -->

<!-- templates in this file are meant as manual replacements for the layouts engine. AKA, this file should not be used in pure layout forms. -->
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<!-- the default template for the 'manual' container object -->
<xsl:template match="manual">
<xsl:text disable-output-escaping="yes"><![CDATA[<!-- display the form's manual based fields -->
<table border='0' cellpadding='0' width='100%'>
]]></xsl:text>
<xsl:apply-templates select="field|div|section"/>
<xsl:text disable-output-escaping="yes"><![CDATA[</table>
]]></xsl:text>
</xsl:template>
<!-- section template. For print pages, prepend print_ to the name of the div, so we can reference it seperately in the stylesheet -->
<xsl:template match="section">
<xsl:text disable-output-escaping="yes"><![CDATA[<tr><td class='sectionlabel'><input type='checkbox' id='form_cb_m_]]></xsl:text>
<xsl:value-of select="position()"/>
<xsl:text disable-output-escaping="yes"><![CDATA[' value='1' data-section="]]></xsl:text>
<xsl:value-of select="@name"/>
<xsl:text disable-output-escaping="yes"><![CDATA[" checked="checked" />]]></xsl:text>
<xsl:value-of select="@label"/>
<xsl:text disable-output-escaping="yes"><![CDATA[</td></tr><tr><td>]]></xsl:text>
<xsl:text disable-output-escaping="yes"><![CDATA[<div id="]]></xsl:text>
<xsl:if test="$page='print'">
<xsl:text disable-output-escaping="yes"><![CDATA[print_]]></xsl:text>
</xsl:if>
<xsl:value-of select="@name"/>
<xsl:text disable-output-escaping="yes"><![CDATA[" class='section'><table>
]]></xsl:text>
<xsl:call-template name="consumeRows">
 <xsl:with-param name="fields" select="field"/>
 <xsl:with-param name="checked" select="1"/>
 <xsl:with-param name="consumedcols" select="0"/>
 <xsl:with-param name="numofCols" select="//style/@cells_per_row"/>
</xsl:call-template>
<xsl:text disable-output-escaping="yes"><![CDATA[</table></div>
</td></tr> <!-- end section ]]></xsl:text>
<xsl:value-of select="@name"/>
<xsl:text disable-output-escaping="yes"><![CDATA[ -->
]]></xsl:text>
</xsl:template>
<xsl:template name="consumeRows">
<xsl:param name="fields" />
<xsl:param name="checked" />
<xsl:param name="consumedcols" />
<xsl:param name="numofCols" />
<xsl:text disable-output-escaping="yes"><![CDATA[<!-- called consumeRows ]]></xsl:text>
<xsl:value-of select="$consumedcols"/>
<xsl:value-of select="$checked"/>
<xsl:value-of select="$numofCols"/>
<xsl:text disable-output-escaping="yes"><![CDATA[--> ]]></xsl:text>
<xsl:choose>
<!-- exit condition -->
<xsl:when test="not($fields)">
<xsl:text disable-output-escaping="yes"><![CDATA[<!-- Exiting not($fields) and generating ]]></xsl:text>
<xsl:value-of select="$numofCols - $consumedcols"/>
<xsl:text disable-output-escaping="yes"><![CDATA[ empty fields -->]]></xsl:text>
 <xsl:call-template name="EmptyFields">
  <xsl:with-param name="fields" select="$numofCols - $consumedcols"/>
 </xsl:call-template>
 <xsl:text disable-output-escaping="yes"><![CDATA[</tr>
]]></xsl:text>
</xsl:when>
<xsl:otherwise>
 <xsl:choose>
  <xsl:when test="not($fields[$checked+1])">
<xsl:text disable-output-escaping="yes"><![CDATA[<!-- generating not($fields[$checked+1]) and calling last ]]></xsl:text>
<xsl:text disable-output-escaping="yes"><![CDATA[-->]]></xsl:text>
   <xsl:apply-templates select="$fields[position() &lt;= $checked]"/>
   <xsl:call-template name="consumeRows">
    <xsl:with-param name="fields" select="$fields[position() > $checked]"/>
    <xsl:with-param name="checked" select="$checked"/>
    <xsl:with-param name="consumedcols" select="$fields[$checked]/@cols + $fields[$checked]/@labelcols + $consumedcols"/>
    <xsl:with-param name="numofCols" select="$numofCols"/>
   </xsl:call-template>
  </xsl:when>
  <xsl:when test="$fields[$checked]/@cols + $fields[$checked]/@labelcols + $consumedcols >= $numofCols and $fields[$checked+1]/@cols!=0">
   <xsl:text disable-output-escaping="yes"><![CDATA[<!--  generating ]]></xsl:text>
   <xsl:value-of select="$consumedcols + $fields[$checked]/@cols + $fields[$checked]/@labelcols"/>
   <xsl:text disable-output-escaping="yes"><![CDATA[ cells and calling -->]]></xsl:text>
   <xsl:apply-templates select="$fields[position() &lt;= $checked]"/>
   <xsl:if test="$numofCols - $consumedcols > 0">
    <xsl:text disable-output-escaping="yes"><![CDATA[<!--  generating empties -->]]></xsl:text>
    <xsl:call-template name="EmptyFields"> 
     <xsl:with-param name="fields" select="$numofCols - $consumedcols"/>
    </xsl:call-template>
   </xsl:if>
   <xsl:text disable-output-escaping="yes"><![CDATA[</tr>
]]></xsl:text>
   <xsl:call-template name="consumeRows"> 
    <xsl:with-param name="fields" select="$fields[position() > $checked]"/>
    <xsl:with-param name="checked" select="1"/>
    <xsl:with-param name="consumedcols" select="0"/>
    <xsl:with-param name="numofCols" select="$numofCols"/>
   </xsl:call-template>
  </xsl:when>
  <xsl:otherwise>
   <xsl:text disable-output-escaping="yes"><![CDATA[<!-- just calling -->]]></xsl:text>
   <xsl:call-template name="consumeRows">
    <xsl:with-param name="fields" select="$fields"/>
    <xsl:with-param name="checked" select="$checked+1"/>
    <xsl:with-param name="consumedcols" select="$fields[$checked]/@cols + $fields[$checked]/@labelcols + $consumedcols"/>
    <xsl:with-param name="numofCols" select="$numofCols"/>
   </xsl:call-template>
  </xsl:otherwise>
 </xsl:choose>
</xsl:otherwise>
</xsl:choose>
</xsl:template>
<xsl:template name="EmptyFields">
 <xsl:param name="fields"/>
 <xsl:if test="$fields > 1">
  <xsl:call-template name="EmptyFields">
   <xsl:with-param name="fields" select="$fields=1"/>
  </xsl:call-template>
 </xsl:if>
 <xsl:if test="$fields > 0">
  <xsl:text disable-output-escaping="yes"><![CDATA[<td class='emptycell' colspan='1'></td>]]></xsl:text>
 </xsl:if>
</xsl:template>
<xsl:template match="field[@type='checkbox_list' or @type='checkbox_combo_list' or @type='exams' or @type='textbox' or @type='textarea' or @type='provider' or @type='textfield' or @type='dropdown_list']">
<xsl:if test="@labelcols>0">
 <xsl:text disable-output-escaping="yes"><![CDATA[<td class='fieldlabel' colspan=']]></xsl:text>
 <xsl:value-of select="@labelcols"/>
 <xsl:text disable-output-escaping="yes"><![CDATA['><?php echo xl_layout_label(']]></xsl:text>
 <xsl:value-of select="@label"/>
 <xsl:text disable-output-escaping="yes"><![CDATA[','e').':'; ?></td>]]></xsl:text>
</xsl:if>
<xsl:if test="@cols>0">
 <xsl:text disable-output-escaping="yes"><![CDATA[<td class='text data' colspan=']]></xsl:text>
 <xsl:value-of select="@cols"/>
 <xsl:text disable-output-escaping="yes"><![CDATA['>]]></xsl:text>
</xsl:if>
<xsl:text disable-output-escaping="yes"><![CDATA[<?php echo generate_form_field($manual_layouts[']]></xsl:text>
<xsl:value-of select="@name"/>
<xsl:text disable-output-escaping="yes"><![CDATA['], ]]></xsl:text>
<xsl:if test="$fetchrow!=''">
 <xsl:text disable-output-escaping="yes"><![CDATA[$]]></xsl:text>
 <xsl:value-of select="$fetchrow"/>
 <xsl:text disable-output-escaping="yes"><![CDATA[[']]></xsl:text>
 <xsl:value-of select="@name"/>
 <xsl:text disable-output-escaping="yes"><![CDATA[']]]></xsl:text>
</xsl:if>
<xsl:if test="$fetchrow=''">
 <xsl:text disable-output-escaping="yes"><![CDATA['']]></xsl:text>
</xsl:if>
<xsl:text disable-output-escaping="yes"><![CDATA[); ?>]]></xsl:text>
<xsl:choose>
<xsl:when test="following-sibling::field[position()=1][@cols=0]">
</xsl:when>
<xsl:otherwise>
<xsl:text disable-output-escaping="yes"><![CDATA[</td>]]></xsl:text>
</xsl:otherwise>
</xsl:choose>
</xsl:template>
<!-- the default template for date fields -->
<xsl:template match="field[@type='date']">
<xsl:text disable-output-escaping="yes"><![CDATA[<td>
<span class="fieldlabel"><?php xl(']]></xsl:text>
<xsl:value-of select="@label" />
<xsl:text disable-output-escaping="yes"><![CDATA[','e'); ?>]]></xsl:text>
<xsl:if test="$page!='print' and @name!='effective_date'">
<xsl:text disable-output-escaping="yes"><![CDATA[ (yyyy-mm-dd)]]></xsl:text>
</xsl:if>
<xsl:text disable-output-escaping="yes"><![CDATA[: </span>
</td><td>
   <input type='text' size='10' name=']]></xsl:text>
<xsl:value-of select="@name" />
<xsl:text disable-output-escaping="yes"><![CDATA[' id=']]></xsl:text>
<xsl:value-of select="@name" />
<xsl:if test="@hoverover!=''">
 <xsl:text disable-output-escaping="yes"><![CDATA[' title=']]></xsl:text>
 <xsl:value-of select="@hoverover" />
</xsl:if>
<xsl:text disable-output-escaping="yes"><![CDATA['
]]></xsl:text>
<xsl:if test="$fetchrow!=''">
 <xsl:text disable-output-escaping="yes"><![CDATA[    value="<?php $result=chkdata_Date($]]></xsl:text>
 <xsl:value-of select="$fetchrow"/>
 <xsl:text disable-output-escaping="yes"><![CDATA[,']]></xsl:text>
 <xsl:value-of select="@name" />
 <xsl:text disable-output-escaping="yes"><![CDATA['); echo $result; ?>"
]]></xsl:text>
</xsl:if>
<xsl:if test="$page='new'">
 <xsl:text disable-output-escaping="yes"><![CDATA[    value="<?php echo date('Y-m-d', time()); ?>"
    title="<?php xl('yyyy-mm-dd','e'); ?>"
]]></xsl:text>
</xsl:if>
<xsl:if test="$page!='print' and @name!='effective_date'">
 <xsl:text disable-output-escaping="yes"><![CDATA[    onkeyup='datekeyup(this,mypcc)' onblur='dateblur(this,mypcc)' />
]]></xsl:text>
</xsl:if>
<xsl:if test="$page='print' or @name='effective_date'">
 <xsl:text disable-output-escaping="yes"><![CDATA[    />
]]></xsl:text>
</xsl:if>
<xsl:if test="$page!='print' and @name!='effective_date'">
 <xsl:text disable-output-escaping="yes"><![CDATA[   <img src='../../pic/show_calendar.gif' width='24' height='22'
    id='img_]]></xsl:text>
 <xsl:value-of select="@name" />
 <xsl:text disable-output-escaping="yes"><![CDATA[' alt='[?]' style='cursor:pointer'
    title="<?php xl('Click here to choose a date','e'); ?>" />
<script type="text/javascript">
Calendar.setup({inputField:']]></xsl:text>
 <xsl:value-of select="@name" />
 <xsl:text disable-output-escaping="yes"><![CDATA[', ifFormat:'%Y-%m-%d', button:'img_]]></xsl:text>
 <xsl:value-of select="@name" />
 <xsl:text disable-output-escaping="yes"><![CDATA['});
</script>
]]></xsl:text>
</xsl:if>
<xsl:text disable-output-escaping="yes"><![CDATA[</td>
]]></xsl:text>
</xsl:template>
<!-- div template. For print pages, prepend print_ to the name of the div, so we can reference it seperately in the stylesheet -->
<xsl:template match="div">
<xsl:text disable-output-escaping="yes"><![CDATA[<div id="]]></xsl:text>
<xsl:if test="$page='print'">
 <xsl:text disable-output-escaping="yes"><![CDATA[print_]]></xsl:text>
</xsl:if>
<xsl:value-of select="@name"/>
<xsl:if test="@style">
 <xsl:text disable-output-escaping="yes"><![CDATA[" style="]]></xsl:text>
</xsl:if>
<xsl:value-of select="@style"/>
<xsl:text disable-output-escaping="yes"><![CDATA[">
]]></xsl:text>
<xsl:apply-templates select="field|div"/>
<xsl:text disable-output-escaping="yes"><![CDATA[</div> <!-- end ]]></xsl:text>
<xsl:value-of select="@name"/>
<xsl:text disable-output-escaping="yes"><![CDATA[ -->
</td></tr>
]]></xsl:text>
</xsl:template>
</xsl:stylesheet>
