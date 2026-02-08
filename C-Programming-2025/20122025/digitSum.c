#include <stdio.h>

int main(){

    int n, sum = 0;
    printf("Enter a number: ");
    scanf("%d", &n);

    
    while(n != 0){
        sum = sum + (n % 10); // Add the last digit to sum
        n = n / 10;    // Remove the last digit
    }
    

    // using for loop
    /*
    for(; n != 0; n /= 10){
        sum += n % 10;
    }
    */

    printf("Sum of digits: %d\n", sum);
    return 0;
}