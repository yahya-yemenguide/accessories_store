<?php
/** Dar Al-Kurdi - safe local installer, only appends/replaces scoped CSS in front/base.css. */
declare(strict_types=1);
$project = __DIR__;
$target = $project . '/resources/css/front/base.css';
$source = $project . '/resources/css/front/royal-scrollbar.css';
function stopWith(string $message): void { fwrite(STDERR, "ERROR: {$message}\n"); exit(1); }
if (!is_file($target)) stopWith('Cannot find resources/css/front/base.css. Put this installer in the accessories_store project ROOT.');
if (!is_file($source)) stopWith('Cannot find resources/css/front/royal-scrollbar.css. Copy the resources folder from the ZIP first.');
$old = file_get_contents($target);
$style = file_get_contents($source);
if ($old === false || $style === false) stopWith('Cannot read CSS files.');
$start = '/* BEGIN DAR AL-KURDI CHAMPAGNE SCROLLBAR V1 */';
$end = '/* END DAR AL-KURDI CHAMPAGNE SCROLLBAR V1 */';
$block = "\n\n" . $start . "\n" . rtrim($style) . "\n" . $end . "\n";
$startPos = strpos($old, $start);
$endPos = strpos($old, $end);
if (($startPos === false) !== ($endPos === false)) stopWith('An incomplete previous scrollbar block was found. No changes were made.');
if ($startPos !== false) {
  if ($endPos < $startPos) stopWith('Previous scrollbar markers are out of order. No changes were made.');
  $endPos += strlen($end);
  $new = substr($old, 0, $startPos) . trim($block) . substr($old, $endPos);
} else {
  $new = rtrim($old) . $block;
}
if ($new === $old) { echo "SUCCESS: Scrollbar is already installed.\n"; exit(0); }
$backup = $target . '.backup-before-royal-scroll-' . date('Ymd-His');
if (!copy($target, $backup)) stopWith('Could not back up base.css. Nothing changed.');
if (file_put_contents($target, $new, LOCK_EX) === false) stopWith('Could not write base.css. Backup: ' . $backup);
echo "SUCCESS: Royal champagne scrollbar installed in front/base.css.\n";
echo "Backup created: " . basename($backup) . "\n";
echo "Only front/base.css was modified. Clear Laravel view cache and refresh browser.\n";
