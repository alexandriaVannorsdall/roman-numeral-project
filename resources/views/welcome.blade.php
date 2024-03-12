<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number to Roman Numeral Converter</title>
    <script>
        function convertToRoman(num) {
            if (!+num)
                return false;
            let digits = String(+num).split(""),
                key = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM",
                    "", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC",
                    "", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
                roman = "",
                i = 3;
            while (i--)
                roman = (key[+digits.pop() + (i * 10)] || "") + roman;
            return Array(+digits.join("") + 1).join("M") + roman;
        }

        function convertToNumber(roman) {
            if (roman == null) return false;
            roman = roman.toUpperCase();
            let num = 0, value = 0,
                lookup = {I: 1, V: 5, X: 10, L: 50, C: 100, D: 500, M: 1000};
            for (let i = roman.length - 1; i >= 0; i--) {
                const ivalue = lookup[roman[i]];
                if (!ivalue) return false;
                num += ivalue * (ivalue < value ? -1 : 1);
                value = ivalue;
            }
            return num;
        }

        function convert() {
            const input = document.getElementById("input").value,
                result = document.getElementById("result"),
                convertedNumber = convertToNumber(input),
                convertedRoman = convertToRoman(input);

            if (!isNaN(input)) {
                if (convertedRoman) {
                    result.value = convertedRoman;
                } else {
                    result.value = 'Invalid Number';
                }
            } else {
                if (convertedNumber) {
                    result.value = convertedNumber;
                } else {
                    result.value = 'Invalid Roman Numeral';
                }
            }
        }

    </script>
</head>
<body>
    <h2>Number ↔ Roman Numeral Converter</h2>
        <label for="input"></label><input type="text" id="input" placeholder="Enter number or Roman numeral">
        <button onclick="convert()">Convert</button>
        <label for="result"></label><input type="text" id="result" readonly>
</body>
</html>

