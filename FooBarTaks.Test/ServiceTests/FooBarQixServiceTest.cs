using System;
using FooBarTask.Services;
using Xunit;

namespace FooBarTaks.Test.ServiceTests
{
    public class FooBarQixServiceTest
    {
        private readonly FooBarQixService _service;

        public FooBarQixServiceTest()
        {
            _service = new FooBarQixService();
        }

        //Tests For Multiples
        [Theory]
        [InlineData(9, "Foo")]
        [InlineData(10, "Bar")]
        [InlineData(15, "FooBarBar")]
        [InlineData(7, "QixQix")]
        [InlineData(21, "FooQix")]
        [InlineData(140, "BarQix")]
        [InlineData(105, "FooBarQixBar")]
        public void FooBarService_ReturnsCorrectStringForMultiples(int number, string expected)
        {
            var result = _service.Transform(number);

            Assert.Equal(expected, result);
        }

        //Test For Digit Occurances
        [Theory]
        [InlineData(13, "Foo")]
        [InlineData(52, "Bar")]
        [InlineData(71, "Qix")]
        [InlineData(35, "BarQixFooBar")]
        [InlineData(37, "FooQix")]
        [InlineData(57, "FooBarQix")]
        public void FooBarService_ReturnsCorrectStringForDigitOccurrences(int number, string expected)
        {
            var result = _service.Transform(number);

            Assert.Equal(expected, result);
        }

        //Test For No Transformations
        [Theory]
        [InlineData(1, "1")]
        public void FooBarService_ReturnsNumberAsString_WhenNotMultipleOrOccurrence(int number, string expected)
        {
            var result = _service.Transform(number);

            Assert.Equal(expected, result);
        }
    }
}