// Write a C program to solve a quadratic equation of the form ax^2 + bx + c = 0 with real coefficients.

#include <stdio.h>
#include <math.h>

int main() {
    float a, b, c;
    float discriminant, root1, root2;

    // Input coefficients a, b and c
    printf("Enter coefficients a, b and c: ");
    scanf("%f %f %f", &a, &b, &c);

    // Calculate the discriminant
    discriminant = b * b - 4 * a * c;

    // Check the nature of the roots based on the discriminant
    if (discriminant > 0) {
        // Two distinct real roots
        root1 = (-b + sqrt(discriminant)) / (2 * a);
        root2 = (-b - sqrt(discriminant)) / (2 * a);
        printf("Roots are real and different.\n");
        printf("Root 1: %.2f\n", root1);
        printf("Root 2: %.2f\n", root2);
    } else if (discriminant == 0) {
        // One real root
        root1 = -b / (2 * a);
        printf("Roots are real and the same.\n");
        printf("Root: %.2f\n", root1);
    } else {
        // No real roots
        printf("No real roots exist.\n");
        // calculate complex roots (optional)
        float realPart = -b / (2 * a);
        float imagPart = sqrt(-discriminant) / (2 * a);
        printf("Root 1: %.2f + %.2fi\n", realPart, imagPart);
        printf("Root 2: %.2f - %.2fi\n", realPart, imagPart);

    }

    return 0;
}


/*******************************
 * 
 * Sample Input/Output:
 * 
 * * Case 1:
 * Enter coefficients a, b and c: 1 -5 6
 * Roots are real and different.
 * Root 1: 3.00
 * Root 2: 2.00
 * ******************************
 * * Case 2:
 * Enter coefficients a, b and c: 1 -4 4
 * Roots are real and the same.
 * Root: 2.00
 * ******************************
 * * Case 3:
 * Enter coefficients a, b and c: 1 2 5
 * No real roots exist.
 * Root 1: -1.00 + 2.00i
 * Root 2: -1.00 - 2.00i    
 * ******************************
 * // End of the program
 *******************************/