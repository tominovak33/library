// Base conversions without using the built in methods

function decToBin (dec) {
    var bin = "";

    var numberOfbits = Math.ceil(Math.log(dec)/Math.log(2)); // No fully supported base 2 log functions so: LogB(x) = LogA(x)/LogA(B) therefore log2(x) = log10(x)/log10(2)
    numberOfbits = ((Math.ceil(numberOfbits/8))*8); // we want either 8, 16, 24, 32 bit numbers etc for ease of readability
    var highestPowerOfTwo = numberOfbits-1; // Starts at 0 (as X to the power of 0 = 1)

    for (var counter = highestPowerOfTwo; counter >= 0; counter--) {
        if (Math.pow(2, counter) <= dec) {
            bin += '1';
            dec -= Math.pow(2,counter);
        } else {
            bin += '0';
        }
    }

    return bin;
}

function binToDec (bin) {
    var dec = 0;
    var counter = 0;

    while (counter <= bin.length) {
        var bit = bin[(bin.length-1)-counter];
            dec += bit*(Math.pow(2, counter));
        counter ++;
    }

    return dec;
}

function decToHex (dec) {
    var hex = "";

    while (dec >= 16) {
        var remainder = (dec % 16).toString();
        remainder = decToHexMap(remainder);
        dec = Math.floor(dec/16);
        hex = remainder + hex;
    }

    if (dec > 0) {
        hex = decToHexMap(dec) + hex;
    }

    return hex;
}

function hexToDec(hex) {
    var dec = 0;
    var counter = 0;

    while (counter < hex.length) {
        var bit = hex[(hex.length-1)-counter];

        var bitValue = hexToDecMap(bit);

        dec += bitValue*(Math.pow(16, counter));
        counter ++;
    }

    return dec;
}

function binToHex (bin) {
    var dec = binToDec(bin);
    return decToHex(dec);
}

function hexToBin (hex) {
    var dec = hexToDec(hex);
    return decToBin(dec);
}

function decToHexMap (number) {
    number = number.toString();

    switch (number) {
        case '10':
            number = 'A';
            break;
        case '11':
            number = 'B';
            break;
        case '12':
            number = 'C';
            break;
        case '13':
            number = 'D';
            break;
        case '14':
            number = 'E';
            break;
        case '15':
            number = 'F';
            break;
    }

    return number;
}

function hexToDecMap (hex) {
    var dec;
    switch (hex) {
        case 'A':
            dec = 10;
            break;
        case 'B':
            dec = 11;
            break;
        case 'C':
            dec = 12;
            break;
        case 'D':
            dec = 13;
            break;
        case 'E':
            dec = 14;
            break;
        case 'F':
            dec = 15;
            break;
        default:
            dec = hex.toString();
    }

    return dec;
}
