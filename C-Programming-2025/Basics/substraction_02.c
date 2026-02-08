#include <stdio.h>

/*
*******************************************************
* Program to subtract two numbers entered by the user
* process: 2
********************************************************
*/

void main(){
    // Declare variables
    int num1, num2;
    // Prompt user for input
    printf("Enter two numbers separated by space: ");
    // Read user input
    scanf("%d %d", &num1, &num2);
    // Display result
    printf("The difference of %d and %d is %d\n", num1, num2, num1 - num2);
}


/*
*********************************************
* Sample Output:
* Enter two numbers separated by space: 5 10
* The difference of 5 and 10 is -5
*********************************************
*/