using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace FooBarTask.Services
{
    public class FooBarQixService
    {
        private static readonly Dictionary<int, string> _multiples = new()
        {
            { 3, "Foo" },
            { 5, "Bar" },
            { 7, "Qix" }
        };

        private static readonly Dictionary<char, string> _digits = new()
        {
            { '3', "Foo" },
            { '5', "Bar" },
            { '7', "Qix" }
        };

        public string Transform(int number)
        {
            var result = new StringBuilder();

            foreach (var (key, value) in _multiples)
            {
                if (number % key == 0)
                {
                    result.Append(value);
                }
            }

            foreach (char digit in number.ToString())
            {
                if (_digits.TryGetValue(digit, out var value))
                {
                    result.Append(value);
                }
            }

            return result.Length > 0 ? result.ToString() : number.ToString();
        }
    }
}