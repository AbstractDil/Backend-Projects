// Write a c program to find the sum of the series 1 - 1/2 + 1/3 - 1/4 + ... + 1/n

#include <stdio.h>

int main(){
    int n, i;
    float sum = 0.0;

    printf("Enter the value of n: ");
    scanf("%d", &n);

    for(i = 1; i <= n; i++){
        if(i % 2 == 0){
            sum -= 1 /(float) i;
        } else {
            sum += 1 / (float)i;
        }
    }

    printf("The sum of the series is: %.3f\n", sum);
    return 0;
}

/**
* Explanation:
* 1. (1/1) - (1/2) + (1/3) - (1/4) + ... + (1/n)
* 2. We take input n from the user.
* 3. We initialize sum as float to store the sum of the series.
* 4. We use a for loop to iterate from 1 to n.
* 5. Inside the loop, we check if the index i is even or odd.
*    - If i is even, we subtract 1/i from sum. (we cast i to float to avoid integer division)
*    - If i is odd, we add 1/i to sum. (we cast i to float to avoid integer division)
* 6. Finally, we print the sum of the series up to n terms.
*/

/**
 * Sample Input/Output:
 * Input: Enter the value of n: 5
 * Output: The sum of the series is: 0.783
 */