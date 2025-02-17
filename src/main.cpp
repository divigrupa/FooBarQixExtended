#include<iostream>
#include "main.h"
#include<string>
using namespace std;

string fooBarService(int number) {
    string result = "";

    if (number % 3 == 0) result += "Foo";
    if (number % 5 == 0) result += "Bar";
    if (number % 7 == 0) result += "Qix";

    string numberStr = to_string(number);
    for (char digit : numberStr) {
        if (digit == '3') result += "Foo";
        if (digit == '5') result += "Bar";
        if (digit == '7') result += "Qix";
    }

    return result.empty() ? numberStr : result;
}