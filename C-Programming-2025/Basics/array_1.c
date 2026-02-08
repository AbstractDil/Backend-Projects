#include <stdio.h>

// example of array in C

int main(){

    int marks[5] = {85, 90, 78, 92, 88};
    for(int i = 0; i < 5; i++){
        printf("Marks of student %d: %d\n", i+1, marks[i]);
    }
    return 0;
}

/**
 * Example Output:
Marks of student 1: 85
Marks of student 2: 90
Marks of student 3: 78
Marks of student 4: 92
Marks of student 5: 88
 */