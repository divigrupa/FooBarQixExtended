using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace FooBarTask.Services
{
    public class InfQixFooService
    {
        private const string separator = ";";

        private static readonly Dictionary<int, string> _multiples = new()
        {
            { 8, "Inf" },
            { 7, "Qix" },
            { 3, "Foo" }
        };

        private static readonly Dictionary<char, string> _digits = new()
        {
            { '8', "Inf" },
            { '7', "Qix" },
            { '3', "Foo" }
        };

        public string Transform(int number)
        {
            var result = new StringBuilder();

            foreach (var (key, value) in _multiples)
            {
                if (number % key == 0)
                {
                    result.Append(value).Append(separator);
                }
            }

            var numberString = number.ToString();
            foreach (var digit in numberString)
            {
                if (_digits.TryGetValue(digit, out var value))
                {
                    result.Append(value);
                }
            }

            if (numberString.Sum(c => c - '0') % 8 == 0)
            {
                result.Append("Inf");
            }

            string finalResult = result.ToString().TrimEnd(separator.ToCharArray());

            return string.IsNullOrEmpty(finalResult) ? numberString : finalResult;
        }
    }
}