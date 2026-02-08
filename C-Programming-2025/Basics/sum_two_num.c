#include <stdio.h>

/*
* Program to sum two numbers entered by the user
* process: 1
*/

int main(){
    // Declare variables
    int num1;
    int num2;
    int sum;
    // Prompt user for first number
    printf("Enter first number: ");
    // Read first number
    scanf("%d", &num1);
    // Prompt user for second number
    printf("Enter second number: ");
    // Read second number
    scanf("%d", &num2);
    // Calculate sum
    sum = num1 + num2;
    // Display result
    printf("The sum of %d and %d is %d\n", num1, num2, sum);
    return 0;
}

/*
*********************************************
* Sample Output:
* Enter first number: 5
* Enter second number: 10
* The sum of 5 and 10 is 15
*********************************************
*/