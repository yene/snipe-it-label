# Snipe-it label generator

It uses paper.css to generate a HTML which you can print. (browser support metric units)

Download your inventory as CSV with first column tag and second column serial, name it `all.csv`.
```
composer install
php main.php
```

## Notes and Learnings
* Make sure the labels you use are easy to remove.
* Make sure you have whitespace around QR code. (called quietzone)
* Use mm units for positioning.
* Don't forget your printer has padding.
* `box-sizing: border-box;` all the divs that have fixed sizes.
* Use forced whitespice to render empty lines.


