/**
 * write a C program that computes the sine of an angle in radians using the Taylor series * * expansion.
 * 
 * sin(x) = x - x^3/3! + x^5/5! - x^7/7! + ...
 * 
 */

#include <stdio.h>
#include <math.h>

int main() {
    float xdeg, sine, term;
    int nStep, sign;

    // input number of terms
    printf("Enter number of terms for Taylor series approximation: ");
    scanf("%d", &nStep);
    // Input angle in degrees
    printf("Enter angle in degrees: ");
    scanf("%f", &xdeg);

    // convert degrees to radians
    float x = (xdeg * 3.14159) / 180.0;

    for(int i = 0; i < nStep; i++) {
        // Calculate each term of the Taylor series
        sign = (i % 2 == 0) ? 1 : -1; // alternate signs
        int exponent = 2 * i + 1;

        // Calculate factorial
        int factorial = 1;
        for(int j = 1; j <= exponent; j++) {
            factorial = factorial * j;
        }

        term = sign * (pow(x, exponent) / factorial);
        sine += term;
      
    }

    printf("Sine of %.2f degrees is approximately: %f\n", xdeg, sine);

    return 0;
}