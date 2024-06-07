<?php
function pdf_create($html, $filename, $stream = TRUE)
{
	$tmpHtmlFile = tempnam(sys_get_temp_dir(), 'html');
	file_put_contents($tmpHtmlFile, $html);

	$outputPdfFile = tempnam(sys_get_temp_dir(), 'pdf') . '.pdf';

	// Tentukan path ke wkhtmltopdf
	$wkhtmltopdfPath = 'E:\pdf\wkhtmltopdf\bin'; // Jika sudah ada di PATH, cukup dengan nama executable

	// Jalankan perintah wkhtmltopdf
	$command = "$wkhtmltopdfPath $tmpHtmlFile $outputPdfFile 2>&1";
	$output = [];
	exec($command, $output);
	print_r($output); // Tambahkan ini untuk debugging jika diperlukan

	if ($stream) {
		header('Content-Type: application/pdf');
		header('Content-Disposition: inline; filename="' . $filename . '.pdf"');
		readfile($outputPdfFile);
	} else {
		return file_get_contents($outputPdfFile);
	}

	// Bersihkan file sementara
	unlink($tmpHtmlFile);
	unlink($outputPdfFile);
}
?>