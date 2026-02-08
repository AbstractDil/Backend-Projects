#include <stdio.h>

// write a function to calculate factorial of a number using for loop

int main(){
    
    int num;
    printf("Enter a number: ");
    scanf("%d", &num);

    // Factorial calculation
    int fact = 1;
    for(int i = 1; i <= num; i++){
        fact = fact * i;
    }
    printf("Factorial of %d is %d\n", num, fact);
    return 0;
}


/**
 * What happens in the loop?

Loop runs from i = 1 to i = num

Each time, multiply the current value of fact by i

This builds the factorial step-by-step

Example for num = 5:

i	fact
--------------
1	1 × 1 = 1
2	1 × 2 = 2
3	2 × 3 = 6
4	6 × 4 = 24
5	24 × 5 = 120

Final value = 120
 */

