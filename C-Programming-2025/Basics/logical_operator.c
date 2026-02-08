#include <stdio.h>

// C program to demonstrate logical operators

int main (){
    int a = 5, b = 5, c = 10, result;
    result = (a = b) && (c > b);
    printf("(a = b) && (c > b) equals to %d \n", result);
    result = (a = b) && (c < b);
    printf("(a = b) && (c < b) equals to %d \n", result);
    result = (a = b) || (c < b);
    printf("(a = b) || (c < b) equals to %d \n", result);
    result = (a != b) || (c < b);
    printf("(a != b) || (c < b) equals to %d \n", result);
    result = !(a != b);
    printf("!(a == b) equals to %d \n", result);
    result = !(a == b);
    printf("!(a == b) equals to %d \n", result);
    return 0;
}

/****************************
* Output: a=b=5, c=10
*****************************
(a = b) && (c > b) equals to 1 
(a = b) && (c < b) equals to 0 
(a = b) || (c < b) equals to 1 
(a != b) || (c < b) equals to 0 
!(a == b) equals to 1 
!(a == b) equals to 0 
*/