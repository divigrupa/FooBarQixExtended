using FooBarTask.Services;
using Xunit;

namespace FooBarTask.Test.ServiceTests
{
    public class InfQixFooServiceTest
    {
        private readonly InfQixFooService _service;

        public InfQixFooServiceTest()
        {
            _service = new InfQixFooService();
        }

        //Tests For Multiples
        [Theory]
        [InlineData(16, "Inf")]
        [InlineData(14, "Qix")]
        [InlineData(9, "Foo")]
        [InlineData(56, "Inf;Qix")]
        [InlineData(24, "Inf;Foo")]
        [InlineData(21, "Qix;Foo")]
        [InlineData(168, "Inf;Qix;Foo;Inf")]
        public void InfQixFooService_ReturnsCorrectStringForMultiples(int number, string expected)
        {
            var result = _service.Transform(number);
            Assert.Equal(expected, result);
        }

        //Tests For Digit Occurances
        [Theory]
        [InlineData(28, "Qix;Inf")]
        [InlineData(27, "Foo;Qix")]
        [InlineData(13, "Foo")]
        [InlineData(87, "Foo;InfQix")]
        [InlineData(83, "InfFoo")]
        [InlineData(37, "FooQix")]
        public void InfQixFooService_ReturnsCorrectStringForDigitOccurrences(int number, string expected)
        {
            var result = _service.Transform(number);
            Assert.Equal(expected, result);
        }
        
        //Test For Muliples And Digits
        [Theory]
        [InlineData(378, "Qix;Foo;FooQixInf")]
        public void InfQixFooService_ReturnsCorrectStringForMultipleAndContains(int number, string expected)
        {
            var result = _service.Transform(number);
            Assert.Equal(expected, result);
        }
        
        //Tests For Digit Sum
        [Theory]
        [InlineData(232, "Inf;Foo")]
        [InlineData(88, "Inf;InfInfInf")]
        public void InfQixFooService_ReturnsCorrectStringForSumOfDigits(int number, string expected)
        {
            var result = _service.Transform(number);
            Assert.Equal(expected, result);
        }
        
        //Test For No Transformations
        [Theory]
        [InlineData(1, "1")]
        public void InfQixFooService_ReturnNumberAsString(int number, string expected)
        {
            var result = _service.Transform(number);
            Assert.Equal(expected, result);
        }
    }
}