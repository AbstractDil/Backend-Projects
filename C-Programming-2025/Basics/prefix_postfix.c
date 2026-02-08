#include <stdio.h>

int main(void) {
    int a = 5, b;

    // Postfix: value of a is used first (5), then a becomes 6
    b = a++;
    // after this: a == 6, b == 5
    printf("After b = a++ -> a = %d, b = %d\n", a, b);

    a = 5; // reset
    // Prefix: a becomes 6 first, then value 6 is assigned to b
    b = ++a;
    // after this: a == 6, b == 6
    printf("After b = ++a -> a = %d, b = %d\n", a, b);

    // Postfix in an expression
    a = 3;
    printf("Using postfix in expression: a = %d, (a++ + 2) = %d, now a = %d\n",
           a, a++ + 2, a);
    // Evaluation: (a++ + 2) uses a's old value 3 -> 3+2 = 5; after expression a becomes 4

    // Prefix in an expression
    a = 3;
    printf("Using prefix in expression: a = %d, (++a + 2) = %d, now a = %d\n",
           a, ++a + 2, a);
    // (++a + 2) increments a to 4 then 4+2 = 6

    return 0;
}


/****************************
* Output:
******************************
After b = a++ -> a = 6, b = 5
After b = ++a -> a = 6, b = 6
Using postfix in expression: a = 3, (a++ + 2) = 5, now a = 4
Using prefix in expression: a = 3, (++a + 2) = 6, now a = 4
*****************************/  
