#include "infqixfoo.h"
#include <string>

using namespace std;

string infqixfoo(int number) {
    string result = "";
    bool hasMultiple = false;

    // Handle multiples first (separated by semicolons)
    if (number % 8 == 0) {
        result += "Inf";
        hasMultiple = true;
    }
    if (number % 7 == 0) {
        if (hasMultiple) result += ";";
        result += "Qix";
        hasMultiple = true;
    }
    if (number % 3 == 0) {
        if (hasMultiple) result += ";";
        result += "Foo";
        hasMultiple = true;
    }

    // Handle occurrences (also separated by semicolons)
    string numberStr = to_string(number);
    for (char digit : numberStr) {
        if (digit == '8') {
            if (hasMultiple) result += ";";
            result += "Inf";
            hasMultiple = true;
        }
        if (digit == '7') {
            if (hasMultiple) result += ";";
            result += "Qix";
            hasMultiple = true;
        }
        if (digit == '3') {
            if (hasMultiple) result += ";";
            result += "Foo";
            hasMultiple = true;
        }
    }

    // Handle sum of digits condition (append "Inf" at the very end without a semicolon)
    int digitSum = 0;
    for (char digit : numberStr) {
        digitSum += digit - '0';
    }

    if (digitSum % 8 == 0) {
        result += "Inf";  // Append "Inf" directly without modifying previous structure
    }

    return result.empty() ? numberStr : result;
}
