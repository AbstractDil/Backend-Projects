#include <stdio.h>

/*
******************************************************************
* Write a C program to multiply two numbers entered by the user
*******************************************************************
*/

int main(){
    // Declare variables
    int num1, num2, product;
    // Prompt user for input
    printf("Enter two numbers separated by space: ");
    // Read user input
    scanf("%d %d", &num1, &num2);
    // Calculate product
    product = num1 * num2;
    // Display result
    printf("The product of %d and %d is %d\n", num1, num2, product);
    return 0;
}

/*
**********************************************************
* Sample Output:
* Enter two numbers separated by space: 3 4
* The product of 3 and 4 is 12
**********************************************************
*/