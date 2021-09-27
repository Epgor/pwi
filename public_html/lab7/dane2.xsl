<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
  <h2>My Cars Collection</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th style="text-align:left">marka</th>
      <th style="text-align:left">model</th>
      <th style="text-align:left">typ</th>
      <th style="text-align:left">rocznik</th>
      <th style="text-align:left">silnik</th>
      <th style="text-align:left">paliwo</th>
      <th style="text-align:left">pierwsza_rej</th>
    </tr>
    <xsl:for-each select="catalog/car">
      <xsl:sort select="pierwsza_rej"/> 

      <tr>
        <td><xsl:value-of select="marka"/></td>
        <td><xsl:value-of select="model"/></td>
        <td><xsl:value-of select="typ"/></td>
        <td><xsl:value-of select="rocznik"/></td>
        <td><xsl:value-of select="silnik"/></td>
        <td><xsl:value-of select="paliwo"/></td>
        <td><xsl:value-of select="pierwsza_rej"/></td>
      </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
